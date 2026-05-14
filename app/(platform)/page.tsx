import type { Metadata } from "next";
import { PageShell } from "@/components/sections/page-shell";
import { pages } from "@/lib/content";
import { buildMetadata } from "@/lib/seo";

const page = pages.home;

export const metadata: Metadata = buildMetadata({
  title: page.title,
  description: page.description,
  path: page.slug,
  brand: page.brand,
});

export default function Page() {
  return <PageShell pageKey="home" showMetrics=true showTeam=false showTestimonials=false />;
}
