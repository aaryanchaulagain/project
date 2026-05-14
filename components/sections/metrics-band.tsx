import { metrics } from "@/lib/content";

export function MetricsBand() {
  return (
    <section className="bg-slate-950 px-6 py-14 text-white lg:px-8">
      <div className="mx-auto grid max-w-7xl gap-4 sm:grid-cols-2 lg:grid-cols-4">
        {metrics.map((metric) => (
          <div key={metric.label} className="rounded-[2rem] border border-white/10 bg-white/5 p-6 backdrop-blur" data-reveal>
            <p className="text-4xl font-semibold tracking-tight text-amber-300">{metric.value}</p>
            <p className="mt-2 text-sm text-slate-300">{metric.label}</p>
          </div>
        ))}
      </div>
    </section>
  );
}
