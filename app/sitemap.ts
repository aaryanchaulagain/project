import type { MetadataRoute } from "next";
import { pages } from "@/lib/content";

export default function sitemap(): MetadataRoute.Sitemap {
  const base = process.env.NEXT_PUBLIC_SITE_URL ?? "https://inngroup.com.au";
  return Object.values(pages).map((page) => ({
    url: new URL(page.slug, base).toString(),
    lastModified: new Date(),
    changeFrequency: page.slug === "/" ? "weekly" : "monthly",
    priority: page.slug === "/" ? 1 : 0.8,
  }));
}
