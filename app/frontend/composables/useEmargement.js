import dayjs from 'dayjs';

export function useEmargement () {
    const cookie = useCookie("auth")
    const data = useState("emargementsData", () => [])
    const dataArchived = useState("emargementsDataArchived", () => [])
    const allEmargements = useState("allEmargements", () => [])
    const enseignantEmargements = useState("enseignantEmargements", () => [])
    const links = useState("emargementLinks", () => [])
    const linksArchived = useState("emargementLinksArchived", () => [])
    const enseignantEmargementLinks = useState("enseignantEmargementLinks", () => [])
    const oneEmargement = useState("emargementData", () => [])
    const emargementEnum = "emargement"

    // async function getAllemargementWithoutPaginate() {
    //     const response = await $fetch('http://localhost:8000/api/v1/all-emargements', {
    //         method: 'GET',
    //         headers: {
    //             'Authorization': `Bearer ${cookie.value.access_token}`,
    //             'Accept': 'application/json'
    //         }
    //     })

    //     console.log(response);
    //     allemargements.value = []
    //     response.forEach(element => {
    //         const emargement = {
    //             code: '',
    //             name: ''
    //         }
    //         emargement.code = element.emargement_id,
    //         emargement.name = element.emargement_name + " - " + element.emargement_level
    //         allemargements.value.push(emargement)
    //     });
    // }

    async function getAllEmargements (page) {
        data.value = []

        const response = await $fetch(`http://localhost:8000/api/v1/emargements?page=${page}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`
            }
        })
        console.log(response);
        response.data.forEach(element => {
            const emargement = {
                emargement_id: "",
                enseignants: "",
                modules: "",
                beginHour: "",
                endHour: "",
                status: "",
                createdAt: "",
                deletedAt: ""
            }
            emargement.emargement_id = element.emargement_id
            emargement.enseignants = element.enseignant?.user?.name + " " + element.enseignant?.user?.surname
            emargement.modules = element.module.module_name
            emargement.beginHour = element.begin_hour
            emargement.endHour = element.end_hour
            emargement.status = element.status
            emargement.deletedAt = element.deleted_at
            emargement.createdAt = dayjs(element.created_at).format("ddd, MMM D YYYY")

            if (data.value.length < 10 && emargement.deletedAt === null) {
                data.value.push(emargement)
            }
        });

        links.value = []
        if (links.value.length === 0) {
            links.value.push(response.total)
            links.value.push(response.per_page)
        }

    }

    async function getEnseignantEmargements (enseignantId) {
        enseignantEmargements.value = []

        const response = await $fetch(`http://localhost:8000/api/v1/emargements?`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`
            }
        })
        console.log("Enseignant id : ", enseignantId);
        response.data.forEach(element => {
            const emargement = {
                emargement_id: "",
                enseignant_id: "",
                modules: "",
                beginHour: "",
                endHour: "",
                status: "",
                createdAt: "",
                deletedAt: ""
            }
            emargement.emargement_id = element.emargement_id
            emargement.enseignant_id = element.enseignant_id
            emargement.modules = element.module.module_name + " - " + element.module.module_id
            emargement.beginHour = element.begin_hour
            emargement.endHour = element.end_hour
            emargement.status = element.status
            emargement.deletedAt = element.deleted_at
            emargement.createdAt = dayjs(element.created_at).format("ddd, MMM D YYYY")
            console.log("Enseignant id : ", emargement.enseignant_id);

            if (enseignantEmargements.value.length < 10 && emargement.deletedAt === null && emargement.enseignant_id === enseignantId) {
                enseignantEmargements.value.push(emargement)
            }
        });

        if (enseignantEmargements.value.length === 0) {
            const message = "Vous n'avez fait aucun n\'émargement ! 😥"; 
            enseignantEmargements.value.push({message})
        }

        console.log("Enseignant emargement ", enseignantEmargements);

        enseignantEmargementLinks.value = []
        if (enseignantEmargementLinks.value.length === 0) {
            enseignantEmargementLinks.value.push(response.total)
            enseignantEmargementLinks.value.push(response.per_page)
        }

    }

    async function getAllEmargementsArchived (page) {
        dataArchived.value = []

        const response = await $fetch(`http://localhost:8000/api/v1/emargements-archived?page=${page}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`
            }
        })
        console.log(response);
        response.data.forEach(element => {
            const emargement = {
                emargement_id: "",
                enseignants: "",
                cours: "",
                beginHour: "",
                endHour: "",
                status: "",
                createdAt: "",
                deletedAt: ""
            }
            emargement.emargement_id = element.emargement_id
            emargement.enseignants = element.enseignant?.user?.name + " " + element.enseignant?.user?.surname
            emargement.cours = "Cour #" + element.cour.cour_id
            emargement.beginHour = element.begin_hour
            emargement.endHour = element.end_hour
            emargement.status = element.status
            emargement.deletedAt = element.deleted_at
            emargement.createdAt = dayjs(element.created_at).format("ddd, MMM D YYYY")

            if (dataArchived.value.length < 10 && emargement.deletedAt !== null) {
                dataArchived.value.push(emargement)
            }
        });

        linksArchived.value = []
        if (linksArchived.value.length === 0) {
            linksArchived.value.push(response.total)
            linksArchived.value.push(response.per_page)
        }

    }

    async function getEmargement (emargementId) {
        const emargement = {
            emargement_id: "",
            emargement_name: "",
            emargement_level: "",
            modules: [],
            createdAt: ""
        }

        const response = await $fetch(`http://localhost:8000/api/v1/emargements/${emargementId}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })

        emargement.emargement_id = response.emargement_id
        emargement.emargement_name = response.emargement_name
        emargement.emargement_level = response.emargement_level
        emargement.modules = response.module
        emargement.createdAt = dayjs(response.created_at).format("ddd, MMM D YYYY")

        oneEmargement.value = []
        oneEmargement.value.push(emargement)
    }

    async function updateEmargement (emargementData, emargementId) {

        const responseA = await $fetch(`http://localhost:8000/api/v1/emargements/${emargementId}`, {
            method: 'PUT',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            },
            body: {
                emargement_name: emargementData.emargement_name,
                emargement_level: emargementData.emargement_level,
            }
        })

        getAllEmargements(1)
        return navigateTo('/admin/modules-emargements/emargements')
    }

    async function createEmargement (emargementData) {

        const responseA = await $fetch(`http://localhost:8000/api/v1/emargements`, {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            },
            body: {
                emargement_name: emargementData.emargement_name,
                emargement_level: emargementData.emargement_level.name,
            }
        })

        getAllEmargements(1)
        return navigateTo('/admin/modules-emargements/emargements')
    }

    async function deleteEmargement (emargementId) {

        const responseA = await $fetch(`http://localhost:8000/api/v1/emargements/${emargementId}`, {
            method: 'DELETE',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })

        getAllEmargements(1)
    }

    async function restoreEmargement (emargementId) {

        const responseA = await $fetch(`http://localhost:8000/api/v1/emargements-restored/${emargementId}`, {
            method: 'PATCH',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })

        getAllEmargements(1)
    }
    

    return {
        getAllEmargements,
        getEmargement,
        updateEmargement,
        createEmargement,
        deleteEmargement,
        getEnseignantEmargements,
        getAllEmargementsArchived,
        restoreEmargement
    }
}