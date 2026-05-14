import { team } from "@/lib/content";

export function TeamSection() {
  return (
    <section className="bg-white px-6 py-20 lg:px-8">
      <div className="mx-auto max-w-7xl">
        <div className="mb-10" data-reveal>
          <p className="text-sm font-semibold uppercase tracking-[0.25em] text-emerald-600">Our Team</p>
          <h2 className="mt-3 text-4xl font-semibold tracking-tight text-slate-950">People behind the platform</h2>
        </div>
        <div className="grid gap-5 sm:grid-cols-2 lg:grid-cols-5">
          {team.map((member) => (
            <div key={member.name} className="rounded-[2rem] border border-slate-200 bg-slate-50 p-6" data-reveal>
              <div className="mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-slate-950 text-lg font-bold text-white">{member.name.split(" ").map((p) => p[0]).join("")}</div>
              <h3 className="text-lg font-semibold text-slate-950">{member.name}</h3>
              <p className="mt-1 text-sm text-slate-500">{member.role}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
