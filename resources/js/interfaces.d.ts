export declare interface Model {
    id: number;
    actions: actions;
}
type actions = {'edit_url': string, 'delete_url': string};

declare interface Cliente extends Model {
    name: string;
    email: string;
    phone: string;
    mascotas_count: number;
}

declare interface Mascota extends Model {
    name: string;
    breed: string;
    color: string;
    sex: string;
    cliente_id: number;

}

export declare interface Mascotas{
    mascotas: Mascota[];
}


export declare interface Clientes{
    clientes: Cliente[];
}
