"use client";

import { useState } from "react";
import { Send } from "lucide-react";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Select } from "@/components/ui/select";
import { Textarea } from "@/components/ui/textarea";
import type { BrandKey } from "@/lib/content";

const departments = ["Accounting & Taxation", "Finance", "Insurance", "Remit", "Wealth", "Business Advisory"] as const;

export function ContactForm({ source = "INN_GROUP" }: { source?: BrandKey }) {
  const [status, setStatus] = useState<"idle" | "loading" | "success" | "error">("idle");
  const [message, setMessage] = useState("");

  async function onSubmit(event: React.FormEvent<HTMLFormElement>) {
    event.preventDefault();
    setStatus("loading");
    setMessage("");

    const formData = new FormData(event.currentTarget);
    const payload = Object.fromEntries(formData.entries());

    const response = await fetch("/api/contact", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ ...payload, source }),
    });

    const data = (await response.json()) as { message?: string };
    if (!response.ok) {
      setStatus("error");
      setMessage(data.message ?? "Unable to send your message. Please try again.");
      return;
    }

    event.currentTarget.reset();
    setStatus("success");
    setMessage(data.message ?? "Thank you. We'll get back to you shortly.");
  }

  return (
    <form onSubmit={onSubmit} className="grid gap-4 rounded-[2rem] border border-white/20 bg-white/85 p-5 shadow-2xl shadow-slate-950/10 backdrop-blur-xl md:grid-cols-2" data-reveal>
      <Input name="name" placeholder="Name *" required />
      <Input name="email" type="email" placeholder="E-Mail *" required />
      <Input name="phone" placeholder="Phone" />
      <Input name="company" placeholder="Company" />
      <Select name="department" defaultValue="Accounting & Taxation" required>
        {departments.map((department) => <option key={department} value={department}>{department}</option>)}
      </Select>
      <Input name="desiredTime" placeholder="Desired time and date" />
      <Input className="md:col-span-2" name="subject" placeholder="Subject *" required />
      <Textarea className="md:col-span-2" name="message" placeholder="Message *" required />
      {message ? <p className={status === "success" ? "text-sm font-medium text-emerald-700" : "text-sm font-medium text-red-600"}>{message}</p> : <span />}
      <Button type="submit" disabled={status === "loading"} variant="premium" className="md:justify-self-end">
        {status === "loading" ? "Sending..." : "Send Message"}<Send className="h-4 w-4" />
      </Button>
    </form>
  );
}
