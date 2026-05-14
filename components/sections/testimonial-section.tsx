import { testimonials } from "@/lib/content";

export function TestimonialSection() {
  return (
    <section className="bg-gradient-to-br from-slate-950 via-slate-900 to-emerald-950 px-6 py-20 text-white lg:px-8">
      <div className="mx-auto max-w-7xl">
        <div className="mb-10" data-reveal>
          <p className="text-sm font-semibold uppercase tracking-[0.25em] text-amber-300">Client Testimonial</p>
          <h2 className="mt-3 text-4xl font-semibold tracking-tight">Trusted by clients across Sydney</h2>
        </div>
        <div className="grid gap-5 lg:grid-cols-3">
          {testimonials.slice(0, 3).map((item) => (
            <figure key={item.author} className="rounded-[2rem] border border-white/10 bg-white/10 p-7 backdrop-blur" data-reveal>
              <blockquote className="text-base leading-8 text-slate-100">“{item.quote}”</blockquote>
              <figcaption className="mt-6 text-sm font-semibold uppercase tracking-[0.18em] text-amber-200">{item.author}</figcaption>
            </figure>
          ))}
        </div>
      </div>
    </section>
  );
}
