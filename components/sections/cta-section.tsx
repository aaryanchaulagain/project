import Link from "next/link";
import { Button } from "@/components/ui/button";

export function CtaSection() {
  return (
    <section className="px-6 py-20 lg:px-8">
      <div className="mx-auto max-w-7xl overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-slate-950 via-slate-900 to-amber-950 p-8 text-white shadow-2xl shadow-slate-950/20 lg:p-12" data-reveal>
        <div className="max-w-3xl">
          <p className="text-sm font-semibold uppercase tracking-[0.25em] text-amber-300">Get in touch by mail or phone</p>
          <h2 className="mt-4 text-4xl font-semibold tracking-tight">Free personal consultation</h2>
          <p className="mt-4 text-lg leading-8 text-slate-200">Whether you want accounting, taxation or home loans, there are no charges to you. We'll hold your hand all the way until your matter is settled.</p>
          <Button asChild className="mt-8" variant="premium" size="lg"><Link href="/contact">Make an appointment</Link></Button>
        </div>
      </div>
    </section>
  );
}
