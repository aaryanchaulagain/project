import { PrismaMariaDb } from "@prisma/adapter-mariadb";
import { PrismaClient, UserRole } from "../src/generated/prisma/client";

const databaseUrl = process.env.DATABASE_URL;

if (!databaseUrl) {
  throw new Error("DATABASE_URL is required to seed the database.");
}

const adapter = new PrismaMariaDb(databaseUrl);
const prisma = new PrismaClient({ adapter });

async function main() {
  const organization = await prisma.organization.upsert({
    where: { slug: "acme" },
    update: {},
    create: {
      name: "Acme Inc.",
      slug: "acme",
      description: "Seed organization for local development.",
    },
  });

  const user = await prisma.user.upsert({
    where: { email: "owner@example.com" },
    update: {},
    create: {
      name: "Platform Owner",
      email: "owner@example.com",
      emailVerified: new Date(),
    },
  });

  await prisma.membership.upsert({
    where: {
      userId_organizationId: {
        userId: user.id,
        organizationId: organization.id,
      },
    },
    update: {
      role: UserRole.OWNER,
      status: "ACTIVE",
    },
    create: {
      userId: user.id,
      organizationId: organization.id,
      role: UserRole.OWNER,
      status: "ACTIVE",
    },
  });

  await prisma.featureFlag.upsert({
    where: {
      organizationId_key: {
        organizationId: organization.id,
        key: "dashboard_insights",
      },
    },
    update: { enabled: true },
    create: {
      organizationId: organization.id,
      key: "dashboard_insights",
      enabled: true,
      description: "Enables dashboard insight cards for the starter platform.",
    },
  });
}

main()
  .then(async () => {
    await prisma.$disconnect();
  })
  .catch(async (error) => {
    console.error(error);
    await prisma.$disconnect();
    process.exit(1);
  });
