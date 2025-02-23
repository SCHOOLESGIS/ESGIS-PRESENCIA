export function useUser () {
    async function login (email, password) {
        const cookie = useCookie('auth')
        try {
            const response = await $fetch("http://localhost:8000/api/v1/login", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: {
                    email: email,
                    password: password
                },
                credentials: 'include'
            })
            if (response !== null) {
                cookie.value = response
                console.log(cookie);
                if (cookie.value.user.role === "admin") {
                    return navigateTo('/admin')
                } else if (cookie.value.user.role === "enseignant") {
                    return navigateTo('/enseignants')
                } else {

                }
            }
        } catch (error) {
            console.log(error);
        }
    }

    async function logout () {
        const cookie = useCookie('auth')
        const response = await $fetch('http://localhost:8000/api/v1/logout', {
            method: 'DELETE',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            },
        })
        cookie.value = null
        return navigateTo("/auth")
    }

    return {
        login,
        logout
    }
}