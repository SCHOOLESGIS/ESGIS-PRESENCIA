import dayjs from 'dayjs';

export function useUser () {
    const data = useState('usersData', () => [])
    const links = useState('userLinks', () => [])

    async function login (email, password) {
        const cookie = useCookie('auth')
        const errors = useState('errors', () => [])
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
            errors.value = []
            errors.value.push(error)
            console.log(errors);
        }
    }

    async function logout () {
        const cookie = useCookie('auth')
        const response = await $fetch('http://localhost:8000/api/v1/logout', {
            method: 'DELETE',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })
        cookie.value = null
        return navigateTo("/auth")
    }

    async function deleteUser(userId) {
        const cookie = useCookie('auth')
        const response = await $fetch(`http://localhost:8000/api/v1/users/${userId}`, {
            method: 'DELETE',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })
    }

    async function getAllUsers (page) {
        data.value = []
        const cookie = useCookie('auth')
        const response = await $fetch(`http://localhost:8000/api/v1/users?page=${page}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`
            }
        })

        console.log(response);
        response.data.forEach(element => {
            const user = {
                user_id: "",
                name: "",
                surname: "",
                email: "",
                role: "",
                createdAt: ""
            }
            user.user_id = element.user_id
            user.name = element.name
            user.surname = element.surname
            user.email = element.email
            user.role = element.role
            user.createdAt = dayjs(element.created_at).format("ddd, MMM D YYYY")

            if (data.value.length < 10) {
                data.value.push(user)
            }
        });

        links.value = []
        if (links.value.length === 0) {
            links.value.push(response.total)
            links.value.push(response.per_page)
        }

    }

    return {
        login,
        logout,
        deleteUser,
        getAllUsers
    }
}