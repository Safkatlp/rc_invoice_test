export default function auth({ next, router }) {
	let token = localStorage.getItem("__895kfk_9504__");
	if ( !token ) {
		router.push({ name: "Login" });
	}
	return next();
};