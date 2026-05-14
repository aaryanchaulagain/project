import type { Metadata } from "next";
import { brands, type BrandKey } from "@/lib/content";

const siteUrl = process.env.NEXT_PUBLIC_SITE_URL ?? "https://inngroup.com.au";

export function buildMetadata({ title, description, path = "/", brand = "INN_GROUP" }: { title: string; description: string; path?: string; brand?: BrandKey }): Metadata {
  const brandInfo = brands[brand];
  const fullTitle = `${title} | ${brandInfo.name}`;
  const url = new URL(path, siteUrl).toString();

  return {
    title: fullTitle,
    description,
    alternates: { canonical: url },
    openGraph: {
      title: fullTitle,
      description,
      url,
      siteName: "INN Group Platform",
      type: "website",
      locale: "en_AU",
    },
    twitter: {
      card: "summary_large_image",
      title: fullTitle,
      description,
    },
    robots: { index: true, follow: true },
  };
}
