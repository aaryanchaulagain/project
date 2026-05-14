import * as React from "react";
import { cn } from "@/lib/utils";

export function Input({ className, ...props }: React.InputHTMLAttributes<HTMLInputElement>) {
  return <input className={cn("h-12 w-full rounded-2xl border border-slate-200 bg-white/90 px-4 text-sm text-slate-950 shadow-sm outline-none transition focus:border-amber-400 focus:ring-4 focus:ring-amber-200/50", className)} {...props} />;
}
