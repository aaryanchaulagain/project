import "dotenv/config";
import { associateServices, brands, innServices, pages, team, testimonials, wealthServices } from "../lib/content";
import { prisma } from "../lib/prisma";

async function main() {
  const brandRecords = new Map<string, { id: string }>();

  for (const brand of Object.values(brands)) {
    const record = await prisma.brand.upsert({
      where: { key: brand.key },
      update: { slug: brand.slug, name: brand.name, domain: brand.domain, theme: brand.palette, accent: brand.accent },
      create: { key: brand.key, slug: brand.slug, name: brand.name, domain: brand.domain, theme: brand.palette, accent: brand.accent },
      select: { id: true },
    });
    brandRecords.set(brand.key, record);
  }

  for (const page of Object.values(pages)) {
    const brand = brandRecords.get(page.brand);
    if (!brand) continue;
    const pageRecord = await prisma.page.upsert({
      where: { slug: page.slug },
      update: { title: page.title, eyebrow: page.eyebrow, description: page.description, brandId: brand.id },
      create: { slug: page.slug, title: page.title, eyebrow: page.eyebrow, description: page.description, brandId: brand.id },
    });

    for (const [index, section] of page.sections.entries()) {
      await prisma.section.upsert({
        where: { pageId_order: { pageId: pageRecord.id, order: index } },
        update: { heading: section.heading, body: section.body },
        create: { pageId: pageRecord.id, order: index, heading: section.heading, body: section.body },
      });
    }
  }

  const allServices = [...innServices, ...associateServices, ...wealthServices];
  for (const [index, service] of allServices.entries()) {
    const brand = brandRecords.get(service.brand);
    if (!brand) continue;
    const slug = service.title.toLowerCase().replace(/[^a-z0-9]+/g, "-").replace(/(^-|-$)/g, "");
    await prisma.service.upsert({
      where: { brandId_slug: { brandId: brand.id, slug } },
      update: { title: service.title, description: service.description, icon: service.icon, href: service.href, order: index },
      create: { brandId: brand.id, slug, title: service.title, description: service.description, icon: service.icon, href: service.href, order: index },
    });
  }

  const associates = brandRecords.get("ASSOCIATES");
  if (associates) {
    for (const [index, member] of team.entries()) {
      await prisma.teamMember.upsert({
        where: { id: `${associates.id}-${member.name}` },
        update: { name: member.name, role: member.role, order: index },
        create: { id: `${associates.id}-${member.name}`, brandId: associates.id, name: member.name, role: member.role, order: index },
      });
    }

    for (const [index, item] of testimonials.entries()) {
      await prisma.testimonial.upsert({
        where: { id: `${associates.id}-${index}` },
        update: { quote: item.quote, author: item.author, order: index },
        create: { id: `${associates.id}-${index}`, brandId: associates.id, quote: item.quote, author: item.author, order: index },
      });
    }
  }

  await prisma.siteSetting.upsert({
    where: { key: "deployment_notes" },
    update: { value: "Run prisma migrate deploy, prisma db seed, then next start behind your production platform." },
    create: { key: "deployment_notes", value: "Run prisma migrate deploy, prisma db seed, then next start behind your production platform." },
  });
}

main()
  .then(async () => prisma.$disconnect())
  .catch(async (error) => {
    console.error(error);
    await prisma.$disconnect();
    process.exit(1);
  });
