"use client";

import Link from "next/link";
import { usePathname } from "next/navigation";
import { Menu, X } from "lucide-react";
import { useState } from "react";
import { Button } from "@/components/ui/button";
import { brands, navItems } from "@/lib/content";
import { cn } from "@/lib/utils";

export function SiteHeader() {
  const pathname = usePathname();
  const [open, setOpen] = useState(false);
  const isWealth = pathname.startsWith("/wealth");
  const isAssociates = pathname.startsWith("/associates");
  const activeBrand = isWealth ? brands.WEALTH : isAssociates ? brands.ASSOCIATES : brands.INN_GROUP;

  return (
    <header className="fixed inset-x-0 top-0 z-50 px-4 pt-4 sm:px-6 lg:px-8">
      <div className="mx-auto flex max-w-7xl items-center justify-between rounded-full border border-white/15 bg-white/75 px-4 py-3 shadow-2xl shadow-slate-950/10 backdrop-blur-2xl dark:bg-slate-950/70">
        <Link href="/" className="group flex items-center gap-3" onClick={() => setOpen(false)}>
          <span className={cn("flex h-11 w-11 items-center justify-center rounded-full text-sm font-black tracking-tight", isWealth ? "bg-zinc-950 text-slate-100 ring-1 ring-white/20" : isAssociates ? "bg-emerald-600 text-white" : "bg-slate-950 text-amber-300")}>
            INN
          </span>
          <span className="leading-tight">
            <span className="block text-sm font-bold text-slate-950 dark:text-white">{activeBrand.name}</span>
            <span className="hidden text-xs text-slate-500 sm:block">{activeBrand.strapline}</span>
          </span>
        </Link>

        <nav className="hidden items-center gap-1 lg:flex">
          {navItems.map((item) => (
            <Link
              key={item.href}
              href={item.href}
              className={cn(
                "rounded-full px-4 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-950 hover:text-white dark:text-slate-300",
                pathname === item.href || (item.href !== "/" && pathname.startsWith(item.href)) ? "bg-slate-950 text-white dark:bg-white dark:text-slate-950" : "",
              )}
            >
              {item.label}
            </Link>
          ))}
        </nav>

        <div className="hidden items-center gap-3 lg:flex">
          <Link href="mailto:info@inngroup.com.au" className="text-sm font-medium text-slate-500">info@inngroup.com.au</Link>
          <Button asChild variant={isWealth ? "silver" : isAssociates ? "emerald" : "premium"}>
            <Link href="/contact">Book consultation</Link>
          </Button>
        </div>

        <button className="rounded-full border border-slate-200 p-3 lg:hidden" onClick={() => setOpen((value) => !value)} aria-label="Toggle navigation">
          {open ? <X className="h-5 w-5" /> : <Menu className="h-5 w-5" />}
        </button>
      </div>

      {open ? (
        <div className="mx-auto mt-3 max-w-7xl rounded-[2rem] border border-white/20 bg-white/95 p-4 shadow-2xl backdrop-blur-2xl lg:hidden">
          <nav className="grid gap-2">
            {navItems.map((item) => (
              <Link key={item.href} href={item.href} onClick={() => setOpen(false)} className="rounded-2xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-100">
                {item.label}
              </Link>
            ))}
          </nav>
        </div>
      ) : null}
    </header>
  );
}
