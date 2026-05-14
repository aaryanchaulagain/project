import { NextResponse, type NextRequest } from "next/server";

const protectedRoutes = ["/dashboard"];

export function middleware(request: NextRequest) {
  const isProtectedRoute = protectedRoutes.some((route) =>
    request.nextUrl.pathname.startsWith(route),
  );

  if (!isProtectedRoute) {
    return NextResponse.next();
  }

  // Replace this placeholder with your session lookup once auth is wired.
  return NextResponse.next();
}

export const config = {
  matcher: ["/dashboard/:path*"],
};
