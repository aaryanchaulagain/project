import Link from "next/link";
import { contactDetails, exploreLinks, navItems } from "@/lib/content";

export function SiteFooter() {
  return (
    <footer className="border-t border-white/10 bg-slate-950 text-white">
      <div className="mx-auto grid max-w-7xl gap-10 px-6 py-16 lg:grid-cols-[1.25fr_0.75fr_0.75fr] lg:px-8">
        <div className="space-y-5">
          <p className="text-sm font-semibold uppercase tracking-[0.3em] text-amber-300">INN Group Platform</p>
          <h2 className="max-w-xl text-3xl font-semibold tracking-tight">Any more questions? Feel free to write us a mail!</h2>
          <p className="max-w-2xl text-sm leading-7 text-slate-300">We&apos;ll respond your queries immediately. {contactDetails.disclaimer}</p>
        </div>
        <div>
          <h3 className="mb-4 text-sm font-semibold uppercase tracking-[0.25em] text-slate-400">Explore</h3>
          <div className="grid gap-3">
            {navItems.map((item) => <Link key={item.href} href={item.href} className="text-sm text-slate-300 hover:text-white">{item.label}</Link>)}
          </div>
        </div>
        <div>
          <h3 className="mb-4 text-sm font-semibold uppercase tracking-[0.25em] text-slate-400">Contact</h3>
          <div className="space-y-3 text-sm leading-6 text-slate-300">
            <p>{contactDetails.extendedAddress}</p>
            <p>Phone: +61 02 8592 1165</p>
            <p>Mob: {contactDetails.mobiles}</p>
            <p>Email: info@inngroup.com.au</p>
          </div>
        </div>
      </div>
      <div className="border-t border-white/10 px-6 py-6">
        <div className="mx-auto flex max-w-7xl flex-col gap-4 text-xs text-slate-400 md:flex-row md:items-center md:justify-between">
          <p>© 2026 Innovative Associates | Innovative Wealth</p>
          <p className="max-w-3xl">Member links: {exploreLinks.join(" | ")}</p>
        </div>
      </div>
    </footer>
  );
}
