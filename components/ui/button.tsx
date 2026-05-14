import * as React from "react";
import { Slot } from "@radix-ui/react-slot";
import { cva, type VariantProps } from "class-variance-authority";
import { cn } from "@/lib/utils";

const buttonVariants = cva(
  "inline-flex items-center justify-center gap-2 rounded-full text-sm font-semibold transition-all duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50",
  {
    variants: {
      variant: {
        default: "bg-slate-950 text-white shadow-lg shadow-slate-950/20 hover:-translate-y-0.5 hover:bg-slate-800",
        premium: "bg-gradient-to-r from-amber-300 via-yellow-500 to-amber-600 text-slate-950 shadow-xl shadow-amber-500/25 hover:-translate-y-0.5",
        emerald: "bg-emerald-600 text-white shadow-xl shadow-emerald-600/20 hover:-translate-y-0.5 hover:bg-emerald-700",
        silver: "bg-gradient-to-r from-zinc-100 via-slate-300 to-zinc-500 text-black shadow-xl shadow-white/10 hover:-translate-y-0.5",
        outline: "border border-white/20 bg-white/10 text-white backdrop-blur hover:bg-white/20",
        ghost: "text-slate-700 hover:bg-slate-100",
      },
      size: {
        default: "h-11 px-6",
        sm: "h-9 px-4",
        lg: "h-13 px-8 text-base",
      },
    },
    defaultVariants: {
      variant: "default",
      size: "default",
    },
  },
);

export interface ButtonProps extends React.ButtonHTMLAttributes<HTMLButtonElement>, VariantProps<typeof buttonVariants> {
  asChild?: boolean;
}

export function Button({ className, variant, size, asChild = false, ...props }: ButtonProps) {
  const Comp = asChild ? Slot : "button";
  return <Comp className={cn(buttonVariants({ variant, size, className }))} {...props} />;
}
