import { prisma } from "@/server/db";

export async function listOrganizations() {
  return prisma.organization.findMany({
    orderBy: {
      createdAt: "desc",
    },
    take: 50,
  });
}
