import AllProduct from './components/products/AllProduct.vue';
import CreateProduct from './components/products/CreateProduct.vue';
import EditProduct from './components/products/EditProduct.vue';

export const routes = [{
        name: 'home',
        path: '/',
        component: AllProduct
    },
    {
        name: 'create',
        path: '/create',
        component: CreateProduct
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditProduct
    }
];
