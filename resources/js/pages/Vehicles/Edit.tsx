import MainLayout from '@/layouts/MainLayout';
import { useForm, usePage } from '@inertiajs/react';
import React from 'react';

interface Vehicle {
    id: number;
    placa: string;
    marca: string;
    modelo: string;
    anio_fabricacion: number;
    nombre_cliente: string;
    apellidos_cliente: string;
    documento_cliente: string;
    correo_cliente: string;
    telefono_cliente: string;
}

interface PageProps {
    vehicles?: Vehicle[];
    vehicle?: Vehicle;
    [key: string]: unknown;
}

export default function Edit() {
    const isEdit = true;
    const { vehicle } = usePage<PageProps>().props;

    const { data, setData, put, errors } = useForm({ ...vehicle });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        if (!vehicle) return;
        put(`/vehicles/${vehicle.id}`);
    };

    const labelMap: Record<string, string> = {
        placa: 'Placa',
        marca: 'Marca',
        modelo: 'Modelo',
        anio_fabricacion: 'Año de Fabricación',
        nombre_cliente: 'Nombre del Cliente',
        apellidos_cliente: 'Apellidos del Cliente',
        documento_cliente: 'Documento del Cliente',
        correo_cliente: 'Correo del Cliente',
        telefono_cliente: 'Teléfono del Cliente',
    };

    return (
        <MainLayout>
            <h1>Editar Vehículo</h1>
            <form onSubmit={handleSubmit} className="mx-auto max-w-2xl space-y-6 rounded-lg bg-white p-6 shadow-md">
                {Object.entries(data)
                    .filter(([key]) => key !== 'id' && key !== 'created_at' && key !== 'updated_at')
                    .map(([key, value]) => (
                        <div key={key}>
                            <label className="mb-1 block text-sm font-medium text-gray-700 capitalize">
                                {labelMap[key] || key.replace(/_/g, ' ')}
                            </label>
                            <input
                                type={
                                    key.includes('correo')
                                        ? 'email'
                                        : key.includes('anio') || key.includes('documento') || key.includes('telefono')
                                          ? 'number'
                                          : 'text'
                                }
                                className={`w-full rounded-md border ${
                                    errors[key as keyof typeof errors] ? 'border-red-500' : 'border-gray-300'
                                } p-2 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500`}
                                value={value}
                                onChange={(e) => setData(key as keyof typeof data, e.target.value)}
                            />
                            {errors[key as keyof typeof errors] && <p className="mt-1 text-sm text-red-600">{errors[key as keyof typeof errors]}</p>}
                        </div>
                    ))}
                <button type="submit" className="w-full rounded bg-indigo-600 px-4 py-2 text-white transition hover:bg-indigo-700">
                    {isEdit ? 'Actualizar' : 'Guardar'}
                </button>
            </form>
        </MainLayout>
    );
}
