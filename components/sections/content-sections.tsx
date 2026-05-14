import type { PageContent } from "@/lib/content";

export function ContentSections({ page }: { page: PageContent }) {
  return (
    <section className="px-6 py-20 lg:px-8">
      <div className="mx-auto grid max-w-7xl gap-5 lg:grid-cols-2">
        {page.sections.map((section, index) => (
          <article key={`${section.heading}-${index}`} className="rounded-[2rem] border border-slate-200 bg-white p-7 shadow-xl shadow-slate-950/5" data-reveal>
            <p className="mb-5 text-sm font-semibold uppercase tracking-[0.24em] text-slate-400">{String(index + 1).padStart(2, "0")}</p>
            <h2 className="text-2xl font-semibold tracking-tight text-slate-950">{section.heading}</h2>
            <p className="mt-4 text-base leading-8 text-slate-600">{section.body}</p>
            {section.points ? <ul className="mt-5 list-disc space-y-2 pl-5 text-sm text-slate-600">{section.points.map((point) => <li key={point}>{point}</li>)}</ul> : null}
          </article>
        ))}
      </div>
    </section>
  );
}
