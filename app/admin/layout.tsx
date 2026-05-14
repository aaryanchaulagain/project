import Link from "next/link";
import type { ReactNode } from "react";

const adminNav = [
  { href: "/admin", label: "Overview" },
  { href: "/admin/contacts", label: "Contacts" },
  { href: "/admin/content", label: "Content" },
  { href: "/", label: "View site" },
];

export default function AdminLayout({ children }: { children: ReactNode }) {
  return (
    <div className="min-h-screen bg-slate-100 text-slate-950">
      <aside className="fixed inset-x-0 top-0 z-40 border-b border-slate-200 bg-white/90 px-6 py-4 backdrop-blur-xl lg:inset-x-auto lg:bottom-0 lg:w-72 lg:border-b-0 lg:border-r">
        <Link href="/admin" className="text-lg font-black tracking-tight">INN CMS</Link>
        <nav className="mt-4 flex gap-2 overflow-x-auto lg:grid">
          {adminNav.map((item) => <Link key={item.href} href={item.href} className="rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-950 hover:text-white">{item.label}</Link>)}
        </nav>
      </aside>
      <main className="px-6 pb-12 pt-32 lg:ml-72 lg:px-10 lg:pt-10">{children}</main>
    </div>
  );
}
