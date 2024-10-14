import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import {PageProps} from '@/types';
import {Head} from '@inertiajs/react';

export default ({users, count}: PageProps) => (
    <AuthenticatedLayout header={
        <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Usuarios
        </h2>
    }>
        <Head title="Usuarios"/>
        <div className="py-12">
            <div className="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div className="p-6 text-gray-900 dark:text-gray-100">
                            <span>
                                Total: {count}
                            </span>
                    </div>
                    <table className="w-full text-left table-auto min-w-max">
                        <thead>
                        <tr>
                            <th className="p-4 border-b border-slate-600 bg-slate-600">
                                <p className="text-sm font-normal leading-none text-slate-300">#</p>
                            </th>
                            <th className="p-4 border-b border-slate-600 bg-slate-600">
                                <p className="text-sm font-normal leading-none text-slate-300">Nombre</p>
                            </th>
                            <th className="p-4 border-b border-slate-600 bg-slate-600">
                                <p className="text-sm font-normal leading-none text-slate-300">Correo</p>
                            </th>
                            <th className="p-4 border-b border-slate-600 bg-slate-600">
                                <p className="text-sm font-normal leading-none text-slate-300">Creado</p>
                            </th>
                            <th className="p-4 border-b border-slate-600 bg-slate-600">
                                <p className="text-sm font-normal leading-none text-slate-300">Ultima Actualización</p>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        {users.map(user => (
                            <tr key={user.id} className="hover:bg-slate-700">
                                <td className="p-4 border-b border-slate-700">
                                    <p className="text-sm text-slate-300 font-semibold">
                                        {user.id}
                                    </p>
                                </td>
                                <td className="p-4 border-b border-slate-700">
                                    <p className="text-sm text-slate-300">
                                        {user.name}
                                    </p>
                                </td>
                                <td className="p-4 border-b border-slate-700">
                                    <p className="text-sm text-slate-300">
                                        {user.email}
                                    </p>
                                </td>
                                <td className="p-4 border-b border-slate-700">
                                    <p className="text-sm text-slate-300">
                                        {user.created_at}
                                    </p>
                                </td>
                                <td className="p-4 border-b border-slate-700">
                                    <p className="text-sm text-slate-300">
                                        {user.updated_at}
                                    </p>
                                </td>
                            </tr>
                        ))}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
)
