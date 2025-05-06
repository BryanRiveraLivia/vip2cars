import { Link } from '@inertiajs/react';
import React from 'react';

export default function MainLayout({ children }: { children: React.ReactNode }) {
    return (
        <div className="min-h-screen bg-gray-100">
            <header className="flex items-center justify-between bg-white p-4 shadow">
                <h1 className="text-lg font-bold text-gray-800">VIP2CARS</h1>
                <nav className="flex gap-4 text-sm">
                    <Link href="/vehicles" className="text-gray-700 hover:text-indigo-600">
                        Lista
                    </Link>
                    <Link href="/vehicles/create" className="text-gray-700 hover:text-indigo-600">
                        Nuevo
                    </Link>
                </nav>
            </header>
            <main className="p-6">{children}</main>
        </div>
    );
}
