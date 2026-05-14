import Link from "next/link";
import { ArrowUpRight, Sparkles } from "lucide-react";
import { Button } from "@/components/ui/button";
import { Badge } from "@/components/ui/badge";
import type { BrandTheme } from "@/lib/content";
import { cn } from "@/lib/utils";

type HeroProps = {
  brand: BrandTheme;
  eyebrow: string;
  title: string;
  description: string;
  primaryHref?: string;
  primaryLabel?: string;
};

export function Hero({ brand, eyebrow, title, description, primaryHref = "/contact", primaryLabel = "Get in touch" }: HeroProps) {
  const dark = brand.palette !== "emerald";

  return (
    <section className={cn("relative isolate overflow-hidden px-6 pb-24 pt-36 lg:px-8 lg:pb-32 lg:pt-44", dark ? "text-white" : "text-slate-950")}>
      <div className={cn("absolute inset-0 -z-20 bg-gradient-to-br", brand.gradient)} />
      <div className="absolute left-1/2 top-16 -z-10 h-96 w-96 -translate-x-1/2 rounded-full bg-white/20 blur-3xl" data-parallax />
      <div className="absolute bottom-0 right-0 -z-10 h-72 w-72 rounded-full bg-amber-300/20 blur-3xl" />
      <div className="mx-auto grid max-w-7xl gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
        <div data-reveal>
          <Badge className={cn(dark ? "text-amber-200" : "border-emerald-200 bg-emerald-50 text-emerald-700")}>{eyebrow}</Badge>
          <h1 className="mt-7 max-w-5xl text-5xl font-semibold tracking-[-0.06em] sm:text-6xl lg:text-7xl">{title}</h1>
          <p className={cn("mt-6 max-w-2xl text-lg leading-8", dark ? "text-slate-200" : "text-slate-600")}>{description}</p>
          <div className="mt-10 flex flex-col gap-3 sm:flex-row">
            <Button asChild size="lg" variant={brand.palette === "emerald" ? "emerald" : brand.palette === "silver" ? "silver" : "premium"}>
              <Link href={primaryHref}>{primaryLabel}<ArrowUpRight className="h-4 w-4" /></Link>
            </Button>
            <Button asChild size="lg" variant={dark ? "outline" : "ghost"}>
              <Link href="/services">Explore services</Link>
            </Button>
          </div>
        </div>
        <div className="relative" data-reveal>
          <div className="rounded-[2.5rem] border border-white/20 bg-white/10 p-4 shadow-2xl shadow-black/20 backdrop-blur-2xl">
            <div className={cn("rounded-[2rem] border p-8", dark ? "border-white/15 bg-slate-950/35" : "border-emerald-100 bg-white/80")}>
              <div className="flex items-center gap-3">
                <span className="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/15"><Sparkles className="h-5 w-5" /></span>
                <div>
                  <p className="text-sm font-semibold uppercase tracking-[0.2em] opacity-70">Unified platform</p>
                  <p className="font-semibold">{brand.domain}</p>
                </div>
              </div>
              <div className="mt-10 grid gap-4">
                {["Free personal consultation", "Premium advisory experience", "Accounting, finance and wealth in one place"].map((item) => (
                  <div key={item} className="rounded-2xl border border-white/15 bg-white/10 p-4 text-sm font-medium backdrop-blur">{item}</div>
                ))}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
