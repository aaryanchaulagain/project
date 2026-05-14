import type { Metadata } from "next";
import { ContactForm } from "@/components/forms/contact-form";
import { ContentSections } from "@/components/sections/content-sections";
import { Hero } from "@/components/sections/hero";
import { brands, contactDetails, pages } from "@/lib/content";
import { buildMetadata } from "@/lib/seo";

const page = pages.contact;

export const metadata: Metadata = buildMetadata({
  title: page.title,
  description: page.description,
  path: page.slug,
  brand: page.brand,
});

export default function ContactPage() {
  return (
    <>
      <Hero brand={brands.INN_GROUP} eyebrow={page.eyebrow} title={page.title} description={page.description} primaryLabel="Send message" />
      <section className="bg-slate-50 px-6 py-20 lg:px-8">
        <div className="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
          <div data-reveal>
            <p className="text-sm font-semibold uppercase tracking-[0.25em] text-amber-600">Nationwide</p>
            <h2 className="mt-3 text-4xl font-semibold tracking-tight text-slate-950">Where you can find us</h2>
            <div className="mt-8 grid gap-4">
              {contactDetails.offices.map((office) => (
                <div key={office} className="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                  <h3 className="font-semibold text-slate-950">{office}</h3>
                  <p className="mt-2 text-sm leading-6 text-slate-600">{office === "Sydney - HEAD OFFICE" ? `${contactDetails.address}. Phone: +61 02 8592 1165 | Mob: ${contactDetails.mobiles}` : "+61"}</p>
                </div>
              ))}
            </div>
          </div>
          <ContactForm source="INN_GROUP" />
        </div>
      </section>
      <ContentSections page={page} />
    </>
  );
}
