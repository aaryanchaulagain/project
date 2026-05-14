import Link from "next/link";
import { ArrowUpRight } from "lucide-react";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { icons, type ServiceItem } from "@/lib/content";

export function ServiceGrid({ services, title = "Areas of expertise", intro }: { services: ServiceItem[]; title?: string; intro?: string }) {
  return (
    <section className="bg-slate-50 px-6 py-20 lg:px-8">
      <div className="mx-auto max-w-7xl">
        <div className="mb-10 max-w-3xl" data-reveal>
          <p className="text-sm font-semibold uppercase tracking-[0.25em] text-amber-600">Services</p>
          <h2 className="mt-3 text-4xl font-semibold tracking-tight text-slate-950">{title}</h2>
          {intro ? <p className="mt-4 text-lg leading-8 text-slate-600">{intro}</p> : null}
        </div>
        <div className="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
          {services.map((service) => {
            const Icon = icons[service.icon];
            return (
              <Link href={service.href} key={`${service.brand}-${service.title}`} data-reveal>
                <Card className="group h-full transition duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-slate-950/10">
                  <CardHeader>
                    <span className="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-950 text-amber-300 transition group-hover:scale-110"><Icon className="h-5 w-5" /></span>
                    <CardTitle className="flex items-center justify-between gap-4">{service.title}<ArrowUpRight className="h-4 w-4 text-slate-400" /></CardTitle>
                  </CardHeader>
                  <CardContent>{service.description}</CardContent>
                </Card>
              </Link>
            );
          })}
        </div>
      </div>
    </section>
  );
}
