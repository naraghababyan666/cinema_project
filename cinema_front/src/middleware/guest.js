export default function auth({ next, router }) {

    if (!localStorage.getItem('access_token')) {
        return next();
    }
    return router.go(-1);
}