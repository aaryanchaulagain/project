import { NextResponse } from "next/server";
import { prisma } from "@/lib/prisma";
import { contactSchema } from "@/lib/validations";

export async function POST(request: Request) {
  try {
    const body = await request.json();
    const parsed = contactSchema.safeParse(body);

    if (!parsed.success) {
      return NextResponse.json({ message: parsed.error.issues[0]?.message ?? "Invalid request" }, { status: 400 });
    }

    const data = parsed.data;
    await prisma.contactSubmission.create({
      data: {
        name: data.name,
        email: data.email,
        phone: data.phone || null,
        company: data.company || null,
        department: data.department,
        desiredTime: data.desiredTime || null,
        subject: data.subject,
        message: data.message,
        source: data.source,
      },
    });

    return NextResponse.json({ message: "Thank you. We'll get back to you shortly." });
  } catch (error) {
    console.error("contact_submission_failed", error);
    return NextResponse.json({ message: "Unable to store your enquiry right now." }, { status: 500 });
  }
}
