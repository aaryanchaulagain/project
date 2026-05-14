import { cookies } from "next/headers";

export type SessionContext = {
  organizationId?: string;
  userId?: string;
};

export async function getSessionContext(): Promise<SessionContext> {
  const cookieStore = await cookies();
  const userId = cookieStore.get("user_id")?.value;
  const organizationId = cookieStore.get("organization_id")?.value;

  return {
    userId,
    organizationId,
  };
}
