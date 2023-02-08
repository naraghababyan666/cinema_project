export default function auth({ next, router }) {

    if (!localStorage.getItem('access_token')) {
        return router.push({ name: 'ec-login' });
    }
    return next();
}