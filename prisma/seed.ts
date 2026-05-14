import { PrismaClient } from "../generated/prisma/client";

const prisma = new PrismaClient();

async function main() {
  const now = new Date();

  const adminUser = await prisma.user.upsert({
    where: { email: "admin@inngroup.com" },
    update: {
      name: "INN Group Admin",
      role: "ADMIN",
      isActive: true,
    },
    create: {
      name: "INN Group Admin",
      email: "admin@inngroup.com",
      phone: "+1-555-0100",
      passwordHash: process.env["SEED_ADMIN_PASSWORD_HASH"] ?? "replace-with-a-secure-password-hash",
      role: "ADMIN",
      isActive: true,
      emailVerifiedAt: now,
    },
  });

  await prisma.admin.upsert({
    where: { userId: adminUser.id },
    update: {
      displayName: "INN Group Admin",
      role: "SUPER_ADMIN",
      permissions: { all: true },
    },
    create: {
      userId: adminUser.id,
      displayName: "INN Group Admin",
      role: "SUPER_ADMIN",
      permissions: { all: true },
    },
  });

  const brand = await prisma.brand.upsert({
    where: { slug: "inn-group" },
    update: {
      name: "INN Group",
      tagline: "Hospitality, service, and guest experience solutions.",
      websiteUrl: "https://inngroup.com",
    },
    create: {
      name: "INN Group",
      slug: "inn-group",
      tagline: "Hospitality, service, and guest experience solutions.",
      description:
        "INN Group brings hospitality brands, service operations, and guest experience programs together on one platform.",
      websiteUrl: "https://inngroup.com",
    },
  });

  const logoAsset = await prisma.mediaAsset.upsert({
    where: { storageKey: "seed/inn-group-logo.svg" },
    update: {
      brandId: brand.id,
      url: "/media/seed/inn-group-logo.svg",
      altText: "INN Group logo",
    },
    create: {
      brandId: brand.id,
      uploadedById: adminUser.id,
      filename: "inn-group-logo.svg",
      originalName: "inn-group-logo.svg",
      mimeType: "image/svg+xml",
      type: "IMAGE",
      url: "/media/seed/inn-group-logo.svg",
      storageKey: "seed/inn-group-logo.svg",
      altText: "INN Group logo",
    },
  });

  const heroAsset = await prisma.mediaAsset.upsert({
    where: { storageKey: "seed/guest-experience-hero.jpg" },
    update: {
      brandId: brand.id,
      url: "/media/seed/guest-experience-hero.jpg",
      altText: "Guest experience team welcoming visitors",
    },
    create: {
      brandId: brand.id,
      uploadedById: adminUser.id,
      filename: "guest-experience-hero.jpg",
      originalName: "guest-experience-hero.jpg",
      mimeType: "image/jpeg",
      type: "IMAGE",
      url: "/media/seed/guest-experience-hero.jpg",
      storageKey: "seed/guest-experience-hero.jpg",
      altText: "Guest experience team welcoming visitors",
      width: 1600,
      height: 900,
    },
  });

  await prisma.brand.update({
    where: { id: brand.id },
    data: { logoAssetId: logoAsset.id },
  });

  const service = await prisma.service.upsert({
    where: { slug: "guest-experience-management" },
    update: {
      brandId: brand.id,
      heroAssetId: heroAsset.id,
      isFeatured: true,
      status: "PUBLISHED",
      publishedAt: now,
    },
    create: {
      brandId: brand.id,
      heroAssetId: heroAsset.id,
      title: "Guest Experience Management",
      slug: "guest-experience-management",
      summary: "A complete program for service delivery, feedback, and guest retention.",
      description:
        "Design and operate guest experience workflows across hospitality brands, properties, and service teams.",
      content:
        "INN Group helps teams capture guest intent, route service requests, manage follow-up, and measure satisfaction from a unified platform.",
      priceLabel: "Custom programs",
      sortOrder: 1,
      isFeatured: true,
      status: "PUBLISHED",
      publishedAt: now,
    },
  });

  const homePage = await prisma.page.upsert({
    where: { slug: "home" },
    update: {
      brandId: brand.id,
      heroAssetId: heroAsset.id,
      status: "PUBLISHED",
      publishedAt: now,
    },
    create: {
      brandId: brand.id,
      authorId: adminUser.id,
      heroAssetId: heroAsset.id,
      title: "INN Group",
      slug: "home",
      template: "home",
      excerpt: "Hospitality services and growth platform for modern guest teams.",
      body:
        "INN Group connects brands, services, content, leads, and guest conversations in one operating platform.",
      status: "PUBLISHED",
      isHomePage: true,
      publishedAt: now,
    },
  });

  const servicePage = await prisma.page.upsert({
    where: { slug: "services/guest-experience-management" },
    update: {
      brandId: brand.id,
      serviceId: service.id,
      parentId: homePage.id,
      status: "PUBLISHED",
      publishedAt: now,
    },
    create: {
      brandId: brand.id,
      serviceId: service.id,
      parentId: homePage.id,
      authorId: adminUser.id,
      title: "Guest Experience Management",
      slug: "services/guest-experience-management",
      template: "service",
      excerpt: "Operational support for every touchpoint in the guest journey.",
      body:
        "Use INN Group service workflows to collect requests, qualify opportunities, and keep teams aligned around guest outcomes.",
      status: "PUBLISHED",
      publishedAt: now,
    },
  });

  const blog = await prisma.blog.upsert({
    where: { slug: "building-a-guest-first-hospitality-operation" },
    update: {
      brandId: brand.id,
      serviceId: service.id,
      coverAssetId: heroAsset.id,
      status: "PUBLISHED",
      publishedAt: now,
    },
    create: {
      brandId: brand.id,
      serviceId: service.id,
      authorId: adminUser.id,
      coverAssetId: heroAsset.id,
      title: "Building a Guest-First Hospitality Operation",
      slug: "building-a-guest-first-hospitality-operation",
      excerpt: "How connected service data helps hospitality teams respond faster.",
      content:
        "A guest-first operation starts with clear ownership, fast response loops, and content that turns service intent into action.",
      tags: ["hospitality", "guest-experience", "operations"],
      readingTimeMinutes: 4,
      isFeatured: true,
      status: "PUBLISHED",
      publishedAt: now,
    },
  });

  await prisma.fAQ.upsert({
    where: { slug: "what-does-inn-group-manage" },
    update: {
      brandId: brand.id,
      serviceId: service.id,
      pageId: servicePage.id,
      status: "PUBLISHED",
    },
    create: {
      brandId: brand.id,
      serviceId: service.id,
      pageId: servicePage.id,
      createdById: adminUser.id,
      slug: "what-does-inn-group-manage",
      question: "What does INN Group manage?",
      answer:
        "INN Group manages hospitality brand content, service lines, lead capture, contact workflows, testimonials, FAQs, media, SEO, and platform settings.",
      category: "platform",
      sortOrder: 1,
      status: "PUBLISHED",
    },
  });

  await prisma.testimonial.upsert({
    where: { slug: "operations-director-service-workflows" },
    update: {
      brandId: brand.id,
      serviceId: service.id,
      avatarAssetId: logoAsset.id,
      status: "PUBLISHED",
      publishedAt: now,
    },
    create: {
      brandId: brand.id,
      serviceId: service.id,
      createdById: adminUser.id,
      avatarAssetId: logoAsset.id,
      slug: "operations-director-service-workflows",
      clientName: "Avery Stone",
      clientTitle: "Operations Director",
      company: "Harbor Stay Collection",
      quote:
        "INN Group gave our team a cleaner way to manage guest intent, service follow-up, and content updates across properties.",
      rating: 5,
      sortOrder: 1,
      isFeatured: true,
      status: "PUBLISHED",
      publishedAt: now,
    },
  });

  await prisma.sEO.upsert({
    where: { brandId: brand.id },
    update: {
      title: "INN Group | Hospitality Services Platform",
      description: "Hospitality brand, service, lead, content, and guest experience platform.",
      ogImageAssetId: logoAsset.id,
    },
    create: {
      brandId: brand.id,
      ogImageAssetId: logoAsset.id,
      title: "INN Group | Hospitality Services Platform",
      description: "Hospitality brand, service, lead, content, and guest experience platform.",
      keywords: "hospitality, guest experience, service management, INN Group",
      canonicalUrl: "https://inngroup.com",
      structuredData: {
        "@context": "https://schema.org",
        "@type": "Organization",
        name: "INN Group",
        url: "https://inngroup.com",
      },
    },
  });

  await prisma.sEO.upsert({
    where: { pageId: homePage.id },
    update: {
      title: "INN Group | Guest Experience and Hospitality Operations",
      ogImageAssetId: heroAsset.id,
    },
    create: {
      pageId: homePage.id,
      ogImageAssetId: heroAsset.id,
      title: "INN Group | Guest Experience and Hospitality Operations",
      description: "Modern hospitality workflows for brands, services, leads, and content.",
      canonicalUrl: "https://inngroup.com",
    },
  });

  await prisma.sEO.upsert({
    where: { serviceId: service.id },
    update: {
      title: "Guest Experience Management | INN Group",
      ogImageAssetId: heroAsset.id,
    },
    create: {
      serviceId: service.id,
      ogImageAssetId: heroAsset.id,
      title: "Guest Experience Management | INN Group",
      description: "Capture service requests, qualify leads, and improve guest satisfaction.",
      canonicalUrl: "https://inngroup.com/services/guest-experience-management",
    },
  });

  await prisma.sEO.upsert({
    where: { blogId: blog.id },
    update: {
      title: "Building a Guest-First Hospitality Operation | INN Group",
      ogImageAssetId: heroAsset.id,
    },
    create: {
      blogId: blog.id,
      ogImageAssetId: heroAsset.id,
      title: "Building a Guest-First Hospitality Operation | INN Group",
      description: "Learn how connected service data helps hospitality teams respond faster.",
      canonicalUrl: "https://inngroup.com/blog/building-a-guest-first-hospitality-operation",
    },
  });

  await prisma.lead.deleteMany({
    where: {
      email: "jordan@example.com",
      source: "seed",
    },
  });

  await prisma.lead.create({
    data: {
      brandId: brand.id,
      serviceId: service.id,
      ownerId: adminUser.id,
      firstName: "Jordan",
      lastName: "Reed",
      email: "jordan@example.com",
      phone: "+1-555-0199",
      company: "Example Hospitality",
      message: "We are interested in improving guest request routing across our properties.",
      budget: "25000.00",
      source: "seed",
      status: "QUALIFIED",
      consentMarketing: true,
      metadata: {
        campaign: "platform-seed",
      },
    },
  });

  await prisma.contactSubmission.deleteMany({
    where: {
      email: "casey@example.com",
      subject: "Seed contact request",
    },
  });

  await prisma.contactSubmission.create({
    data: {
      brandId: brand.id,
      pageId: homePage.id,
      userId: adminUser.id,
      name: "Casey Morgan",
      email: "casey@example.com",
      phone: "+1-555-0115",
      subject: "Seed contact request",
      message: "Please send more information about INN Group service programs.",
      status: "NEW",
      metadata: {
        source: "seed",
      },
    },
  });

  const settings = [
    {
      key: "site.name",
      group: "site",
      label: "Site Name",
      description: "Public-facing platform name.",
      value: "INN Group",
      type: "STRING",
      isPublic: true,
    },
    {
      key: "lead.notifications.enabled",
      group: "leads",
      label: "Lead Notifications",
      description: "Whether new lead notifications should be sent.",
      value: true,
      type: "BOOLEAN",
      isPublic: false,
    },
    {
      key: "seo.default",
      group: "seo",
      label: "Default SEO",
      description: "Fallback SEO values for public pages.",
      value: {
        title: "INN Group",
        description: "Hospitality services and guest experience platform.",
      },
      type: "JSON",
      isPublic: true,
    },
  ] as const;

  for (const setting of settings) {
    await prisma.settings.upsert({
      where: { key: setting.key },
      update: {
        group: setting.group,
        label: setting.label,
        description: setting.description,
        value: setting.value,
        type: setting.type,
        isPublic: setting.isPublic,
        updatedById: adminUser.id,
      },
      create: {
        key: setting.key,
        group: setting.group,
        label: setting.label,
        description: setting.description,
        value: setting.value,
        type: setting.type,
        isPublic: setting.isPublic,
        updatedById: adminUser.id,
      },
    });
  }
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
