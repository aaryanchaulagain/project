import { ContentSections } from "@/components/sections/content-sections";
import { CtaSection } from "@/components/sections/cta-section";
import { Hero } from "@/components/sections/hero";
import { MetricsBand } from "@/components/sections/metrics-band";
import { ServiceGrid } from "@/components/sections/service-grid";
import { TeamSection } from "@/components/sections/team-section";
import { TestimonialSection } from "@/components/sections/testimonial-section";
import { associateServices, brands, innServices, pages, wealthServices, type PageContent } from "@/lib/content";

function servicesFor(page: PageContent) {
  if (page.brand === "WEALTH") return wealthServices;
  if (page.brand === "ASSOCIATES") return associateServices;
  return innServices;
}

export function PageShell({ pageKey, showMetrics = false, showTeam = false, showTestimonials = false }: { pageKey: keyof typeof pages; showMetrics?: boolean; showTeam?: boolean; showTestimonials?: boolean }) {
  const page = pages[pageKey];
  const brand = brands[page.brand];

  return (
    <>
      <Hero brand={brand} eyebrow={page.eyebrow} title={page.title} description={page.description} />
      <ContentSections page={page} />
      <ServiceGrid services={servicesFor(page)} title={page.brand === "WEALTH" ? "Areas of Expertise" : page.brand === "ASSOCIATES" ? "Our Services" : "Areas of expertise"} intro={page.brand === "WEALTH" ? "We pride ourselves to provide loan pre-approval to property, and accounting to all taxation matters." : undefined} />
      {showMetrics ? <MetricsBand /> : null}
      {showTeam ? <TeamSection /> : null}
      {showTestimonials ? <TestimonialSection /> : null}
      <CtaSection />
    </>
  );
}
