import { createRouter, createWebHistory } from 'vue-router'
import Router from 'vue-router';

import Home from "../components/Home";
import CreateInvoice from "../components/CreateInvoice";
import Invoices from "../components/Invoices";


// middlewares
import auth from "./middlewares/auth.js";

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home
    },
    {
        path: "/create_invoice",
        name: "CreateInvoice",
        component: CreateInvoice
    },
    {
        path: "/invoices",
        name: "Invoices",
        component: Invoices
    },


    // {
    //     path: '/:pathMatch(.*)*',
    //     name: 'NotFound',
    //     component: PageNotFound
    // }
];
// const router = new Router({
//     routes: routes
// });

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
});

// function nextFactory(context, middleware, index) {
//       const subsequentMiddleware = middleware[index];
//       // If no subsequent Middleware exists,
//       // the default `next()` callback is returned.
//       if (!subsequentMiddleware) return context.next;

//       return (...parameters) => {
//           // Run the default Vue Router `next()` callback first.
//           context.next(...parameters);
//           // Then run the subsequent Middleware with a new
//           // `nextMiddleware()` callback.
//           const nextMiddleware = nextFactory(context, middleware, index + 1);
//           subsequentMiddleware({ ...context, next: nextMiddleware });
//       };
// }

// router.beforeEach((to, from, next) => {
//     if (to.meta.middleware) {
//         const middleware = Array.isArray(to.meta.middleware) ? to.meta.middleware : [to.meta.middleware];
//         const context = { from, next, router, to };
//         const nextMiddleware = nextFactory(context, middleware, 1);
//         return middleware[0]({ ...context, next: nextMiddleware });
//     }

//     return next();
// });



export default router;


