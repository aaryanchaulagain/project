import { prisma } from "@/lib/prisma";

export const dynamic = "force-dynamic";

async function getStats() {
  try {
    const [contacts, pages, services, testimonials] = await Promise.all([
      prisma.contactSubmission.count(),
      prisma.page.count(),
      prisma.service.count(),
      prisma.testimonial.count(),
    ]);
    return { contacts, pages, services, testimonials, online: true };
  } catch {
    return { contacts: 0, pages: 12, services: 18, testimonials: 5, online: false };
  }
}

export default async function AdminDashboard() {
  const stats = await getStats();
  return (
    <div className="space-y-8">
      <div>
        <p className="text-sm font-semibold uppercase tracking-[0.25em] text-amber-600">CMS Admin Dashboard</p>
        <h1 className="mt-2 text-4xl font-semibold tracking-tight">INN Group Platform operations</h1>
        <p className="mt-3 max-w-2xl text-slate-600">Manage page content, seeded service data, team/testimonial records and contact enquiries stored in MySQL through Prisma.</p>
      </div>
      {!stats.online ? <div className="rounded-2xl border border-amber-200 bg-amber-50 p-4 text-sm text-amber-900">Database is not reachable in this environment. Seeded production structure is still available for build and deployment.</div> : null}
      <div className="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
        {[
          ["Contact submissions", stats.contacts],
          ["CMS pages", stats.pages],
          ["Services", stats.services],
          ["Testimonials", stats.testimonials],
        ].map(([label, value]) => (
          <div key={label} className="rounded-[2rem] bg-white p-6 shadow-xl shadow-slate-950/5">
            <p className="text-sm text-slate-500">{label}</p>
            <p className="mt-3 text-4xl font-semibold">{value}</p>
          </div>
        ))}
      </div>
    </div>
  );
}
