import { formatDate } from "@/lib/utils";
import { prisma } from "@/lib/prisma";

export const dynamic = "force-dynamic";

async function getContacts() {
  try {
    return await prisma.contactSubmission.findMany({ orderBy: { createdAt: "desc" }, take: 100 });
  } catch {
    return [];
  }
}

export default async function ContactsPage() {
  const contacts = await getContacts();
  return (
    <div className="space-y-8">
      <div>
        <p className="text-sm font-semibold uppercase tracking-[0.25em] text-amber-600">Enquiries</p>
        <h1 className="mt-2 text-4xl font-semibold tracking-tight">Contact submissions</h1>
      </div>
      <div className="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-slate-950/5">
        <div className="grid min-w-[900px] grid-cols-[1fr_1fr_1fr_1fr_1.5fr] gap-4 border-b border-slate-100 p-4 text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">
          <span>Created</span><span>Name</span><span>Department</span><span>Source</span><span>Message</span>
        </div>
        {contacts.length ? contacts.map((contact) => (
          <div key={contact.id} className="grid min-w-[900px] grid-cols-[1fr_1fr_1fr_1fr_1.5fr] gap-4 border-b border-slate-100 p-4 text-sm">
            <span>{formatDate(contact.createdAt)}</span>
            <span>{contact.name}<br /><em className="text-slate-500">{contact.email}</em></span>
            <span>{contact.department}</span>
            <span>{contact.source}</span>
            <span>{contact.subject}<br /><em className="text-slate-500">{contact.message}</em></span>
          </div>
        )) : <p className="p-6 text-sm text-slate-500">No database submissions are available yet.</p>}
      </div>
    </div>
  );
}
