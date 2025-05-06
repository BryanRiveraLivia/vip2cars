import MainLayout from '@/layouts/MainLayout';
import { PencilIcon, TrashIcon } from '@heroicons/react/24/outline';
import { Link, router, usePage } from '@inertiajs/react';

interface Vehicle {
    id: number;
    placa: string;
    marca: string;
    modelo: string;
    anio_fabricacion: number;
    nombre_cliente: string;
    apellidos_cliente: string;
}

interface PageProps {
    vehicles?: Vehicle[];
    [key: string]: unknown;
}

export default function Index() {
    const { vehicles } = usePage<PageProps>().props;

    const handleDelete = (id: number) => {
        if (confirm('¿Eliminar este vehículo?')) {
            router.delete(`/vehicles/${id}`);
        }
    };

    return (
        <MainLayout>
            <h1 className="mb-6 text-2xl font-bold text-gray-800">Vehículos registrados</h1>
            <div className="overflow-x-auto rounded border border-gray-200 bg-white shadow">
                <table className="min-w-full divide-y divide-gray-200 text-sm">
                    <thead className="bg-gray-50 text-left text-xs font-semibold text-gray-600">
                        <tr>
                            <th className="px-4 py-2">Placa</th>
                            <th className="px-4 py-2">Marca</th>
                            <th className="px-4 py-2">Modelo</th>
                            <th className="px-4 py-2">Cliente</th>
                            <th className="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody className="divide-y divide-gray-100">
                        {vehicles?.map((vehicle) => (
                            <tr key={vehicle.id} className="hover:bg-gray-50">
                                <td className="px-4 py-2">{vehicle.placa}</td>
                                <td className="px-4 py-2">{vehicle.marca}</td>
                                <td className="px-4 py-2">{vehicle.modelo}</td>
                                <td className="px-4 py-2">
                                    {vehicle.nombre_cliente} {vehicle.apellidos_cliente}
                                </td>
                                <td className="px-4 py-2">
                                    <div className="flex gap-2">
                                        <Link
                                            href={`/vehicles/${vehicle.id}/edit`}
                                            className="inline-flex items-center gap-1 rounded bg-blue-100 px-2 py-1 text-sm text-blue-700 hover:bg-blue-200"
                                        >
                                            <PencilIcon className="h-4 w-4" /> Editar
                                        </Link>
                                        <button
                                            onClick={() => handleDelete(vehicle.id)}
                                            className="inline-flex items-center gap-1 rounded bg-red-100 px-2 py-1 text-sm text-red-700 hover:bg-red-200"
                                        >
                                            <TrashIcon className="h-4 w-4" /> Eliminar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </MainLayout>
    );
}
