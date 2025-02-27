import dayjs from 'dayjs';

export function useFiliere () {
    const cookie = useCookie("auth")
    const data = useState("filieresData", () => [])
    const allFilieres = useState("allFilieres", () => [])
    const links = useState("filiereLinks", () => [])
    const oneFiliere = useState("filiereData", () => [])
    const filiereEnum = "filiere"

    async function getAllFiliereWithoutPaginate() {
        const response = await $fetch('http://localhost:8000/api/v1/all-filieres', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })

        console.log(response);
        allFilieres.value = []
        response.forEach(element => {
            const filiere = {
                code: '',
                name: ''
            }
            filiere.code = element.filiere_id,
            filiere.name = element.filiere_name + " - " + element.filiere_level
            allFilieres.value.push(filiere)
        });
    }

    async function getAllFilieres (page) {
        data.value = []

        const response = await $fetch(`http://localhost:8000/api/v1/filieres?page=${page}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`
            }
        })

        response.data.forEach(element => {
            const filiere = {
                filiere_id: "",
                filiere_name: "",
                filiere_level: "",
                createdAt: ""
            }
            filiere.filiere_id = element.filiere_id
            filiere.filiere_name = element.filiere_name
            filiere.filiere_level = element.filiere_level
            filiere.createdAt = dayjs(element.created_at).format("ddd, MMM D YYYY")

            if (data.value.length < 10) {
                data.value.push(filiere)
            }
        });

        links.value = []
        if (links.value.length === 0) {
            links.value.push(response.total)
            links.value.push(response.per_page)
        }

    }

    async function getFiliere (filiereId) {
        const filiere = {
            filiere_id: "",
            filiere_name: "",
            filiere_level: "",
            modules: [],
            createdAt: ""
        }

        const response = await $fetch(`http://localhost:8000/api/v1/filieres/${filiereId}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })

        filiere.filiere_id = response.filiere_id
        filiere.filiere_name = response.filiere_name
        filiere.filiere_level = response.filiere_level
        filiere.modules = response.modules
        filiere.createdAt = dayjs(response.created_at).format("ddd, MMM D YYYY")

        oneFiliere.value = []
        oneFiliere.value.push(filiere)
    }

    async function updateFiliere (filiereData, filiereId) {

        const responseA = await $fetch(`http://localhost:8000/api/v1/filieres/${filiereId}`, {
            method: 'PUT',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            },
            body: {
                filiere_name: filiereData.filiere_name,
                filiere_level: filiereData.filiere_level,
            }
        })

        getAllFilieres(1)
        return navigateTo('/admin/modules-filieres/filieres')
    }

    async function createFiliere (filiereData) {

        const responseA = await $fetch(`http://localhost:8000/api/v1/filieres`, {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            },
            body: {
                filiere_name: filiereData.filiere_name,
                filiere_level: filiereData.filiere_level.name,
            }
        })

        getAllFilieres(1)
        return navigateTo('/admin/modules-filieres/filieres')
    }

    async function deleteFiliere (filiereId) {

        const responseA = await $fetch(`http://localhost:8000/api/v1/filieres/${filiereId}`, {
            method: 'DELETE',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })

        getAllFilieres(1)
    }

    return {
        getAllFilieres,
        getFiliere,
        updateFiliere,
        createFiliere,
        deleteFiliere,
        getAllFiliereWithoutPaginate
    }
}