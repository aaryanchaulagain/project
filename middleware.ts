import { NextResponse, type NextRequest } from "next/server";

export function middleware(request: NextRequest) {
  if (!request.nextUrl.pathname.startsWith("/admin")) {
    return NextResponse.next();
  }

  const email = process.env.ADMIN_EMAIL;
  const password = process.env.ADMIN_PASSWORD;

  if (!email || !password || password === "change-me") {
    return NextResponse.next();
  }

  const auth = request.headers.get("authorization");
  const expected = `Basic ${btoa(`${email}:${password}`)}`;

  if (auth === expected) {
    return NextResponse.next();
  }

  return new NextResponse("Authentication required", {
    status: 401,
    headers: { "WWW-Authenticate": 'Basic realm="INN CMS"' },
  });
}

export const config = {
  matcher: ["/admin/:path*"],
};
