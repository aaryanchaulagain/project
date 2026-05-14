import { updateCmsPage } from "./actions";
import { prisma } from "@/lib/prisma";
import { pages as staticPages } from "@/lib/content";

export const dynamic = "force-dynamic";

async function getPages() {
  try {
    return await prisma.page.findMany({ include: { brand: true, sections: { orderBy: { order: "asc" } } }, orderBy: { slug: "asc" } });
  } catch {
    return Object.values(staticPages).map((page) => ({
      id: page.slug,
      slug: page.slug,
      title: page.title,
      description: page.description,
      brand: { name: page.brand },
      sections: page.sections.map((section, index) => ({ id: `${page.slug}-${index}`, heading: section.heading, body: section.body, order: index })),
    }));
  }
}

export default async function ContentPage() {
  const pages = await getPages();
  return (
    <div className="space-y-8">
      <div>
        <p className="text-sm font-semibold uppercase tracking-[0.25em] text-amber-600">Content Management</p>
        <h1 className="mt-2 text-4xl font-semibold tracking-tight">CMS pages and sections</h1>
        <p className="mt-3 text-slate-600">Seeded pages mirror the requested public route structure. When MySQL is connected, title and description updates persist through Prisma.</p>
      </div>
      <div className="grid gap-6">
        {pages.map((page) => (
          <article key={page.id} className="rounded-[2rem] bg-white p-6 shadow-xl shadow-slate-950/5">
            <form action={updateCmsPage} className="grid gap-4 lg:grid-cols-[0.8fr_1fr_auto] lg:items-end">
              <input type="hidden" name="id" value={page.id} />
              <label className="grid gap-2 text-sm font-medium text-slate-600">Title<input name="title" defaultValue={page.title} className="rounded-2xl border border-slate-200 px-4 py-3 text-slate-950" /></label>
              <label className="grid gap-2 text-sm font-medium text-slate-600">Description<input name="description" defaultValue={page.description} className="rounded-2xl border border-slate-200 px-4 py-3 text-slate-950" /></label>
              <button className="rounded-full bg-slate-950 px-5 py-3 text-sm font-semibold text-white">Save</button>
            </form>
            <p className="mt-4 text-sm text-slate-500">{page.slug} / {page.brand.name}</p>
            <div className="mt-5 grid gap-3 md:grid-cols-2">
              {page.sections.map((section) => <div key={section.id} className="rounded-2xl bg-slate-50 p-4"><h3 className="font-semibold">{section.heading}</h3><p className="mt-2 text-sm leading-6 text-slate-600">{section.body}</p></div>)}
            </div>
          </article>
        ))}
      </div>
    </div>
  );
}
