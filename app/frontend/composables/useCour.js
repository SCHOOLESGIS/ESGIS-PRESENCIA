import dayjs from 'dayjs';

export function useCour () {
    const cookie = useCookie("auth")
    const data = useState("coursData", () => [])
    const dataArchived = useState("coursDataArchive", () => [])
    const allCours = useState("allCours", () => [])
    const links = useState("courLinks", () => [])
    const linksArchived = useState("courLinksArchive", () => [])
    const oneCour = useState("courData", () => [])
    const courEnum = "cour"

    // async function getAllcourWithoutPaginate() {
    //     const response = await $fetch('http://localhost:8000/api/v1/all-cours', {
    //         method: 'GET',
    //         headers: {
    //             'Authorization': `Bearer ${cookie.value.access_token}`,
    //             'Accept': 'application/json'
    //         }
    //     })

    //     console.log(response);
    //     allcours.value = []
    //     response.forEach(element => {
    //         const cour = {
    //             code: '',
    //             name: ''
    //         }
    //         cour.code = element.cour_id,
    //         cour.name = element.cour_name + " - " + element.cour_level
    //         allcours.value.push(cour)
    //     });
    // }

    async function getAllCours (page) {
        data.value = []

        const response = await $fetch(`http://localhost:8000/api/v1/cours?page=${page}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`
            }
        })
        response.data.forEach(element => {
            const cour = {
                cour_id: "",
                module: "",
                enseignant: "",
                filiere: "",
                cour_date: "",
                begin_hour: "",
                end_hour: "",
                status: "",
                createdAt: "",
                deletedAt: "",
            }
            cour.cour_id = element.cour_id
            cour.module = element.module.module_name
            cour.enseignant = element.enseignant?.user?.name + " " + element.enseignant?.user?.surname
            cour.filiere = element.filiere.filiere_name + ' - ' + element.filiere.filiere_level
            cour.cour_date = element.cour_date
            cour.begin_hour = element.begin_hour
            cour.end_hour = element.end_hour
            cour.status = element.status
            cour.deletedAt = element.deleted_at
            cour.createdAt = dayjs(element.created_at).format("ddd, MMM D YYYY")

            if (data.value.length < 10 && cour.deletedAt === null) {
                data.value.push(cour)
            }
        });

        links.value = []
        if (links.value.length === 0) {
            links.value.push(response.total)
            links.value.push(response.per_page)
        }

    }

    async function getAllCoursArchived (page) {
        dataArchived.value = []

        const response = await $fetch(`http://localhost:8000/api/v1/cours?page=${page}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`
            }
        })
        response.data.forEach(element => {
            const cour = {
                cour_id: "",
                module: "",
                enseignant: "",
                filiere: "",
                cour_date: "",
                begin_hour: "",
                end_hour: "",
                status: "",
                createdAt: "",
                deletedAt: "",
            }
            cour.cour_id = element.cour_id
            cour.module = element.module.module_name
            cour.enseignant = element.enseignant?.user?.name + " " + element.enseignant?.user?.surname
            cour.filiere = element.filiere.filiere_name + ' - ' + element.filiere.filiere_level
            cour.cour_date = element.cour_date
            cour.begin_hour = element.begin_hour
            cour.end_hour = element.end_hour
            cour.status = element.status
            cour.deletedAt = element.deleted_at
            cour.createdAt = dayjs(element.created_at).format("ddd, MMM D YYYY")

            if (dataArchived.value.length < 10 && cour.deletedAt !== null) {
                dataArchived.value.push(cour)
            }
        });

        linksArchived.value = []
        if (linksArchived.value.length === 0) {
            linksArchived.value.push(response.total)
            linksArchived.value.push(response.per_page)
        }

    }

    async function getCour (courId) {
        const cour = {
            cour_id: "",
            module: "",
            enseignant: "",
            filiere: "",
            cour_date: "",
            begin_hour: "",
            end_hour: "",
            status: "",
            createdAt: ""
        }

        const response = await $fetch(`http://localhost:8000/api/v1/cours/${courId}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })

        cour.cour_id = element.cour_id
        cour.module = element.module.module_name
        cour.enseignant = element.enseignant?.user?.name + " " + element.enseignant?.user?.surname
        cour.filiere = element.filiere.filiere_name + ' - ' + element.filiere.filiere_level
        cour.cour_date = element.cour_date
        cour.begin_hour = element.begin_hour
        cour.end_hour = element.end_hour
        cour.status = element.status
        cour.createdAt = dayjs(element.created_at).format("ddd, MMM D YYYY")

        onecour.value = []
        onecour.value.push(cour)
    }

    async function updateCour (courData, courId) {

        const responseA = await $fetch(`http://localhost:8000/api/v1/cours/${courId}`, {
            method: 'PUT',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            },
            body: {
                cour_id: element.cour_id,
                module: element.module.module_name,
                enseignant: element.enseignant?.user?.name + " " + element.enseignant?.user?.surname,
                filiere: element.filiere.filiere_name + ' - ' + element.filiere.filiere_level,
                cour_date: element.cour_date,
                begin_hour: element.begin_hour,
                end_hour: element.end_hour,
                status: element.status,
                createdAt: dayjs(element.created_at).format("ddd, MMM D YYYY")
            }
        })

        getAllCours(1)
        return navigateTo('/admin/modules-cours/cours')
    }

    async function createCour (courData) {

        const responseA = await $fetch(`http://localhost:8000/api/v1/cours`, {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            },
            body: {
                cour_name: courData.cour_name,
                cour_level: courData.cour_level.name,
            }
        })

        getAllCours(1)
        return navigateTo('/admin/modules-cours/cours')
    }

    async function deleteCour (courId) {

        const responseA = await $fetch(`http://localhost:8000/api/v1/cours/${courId}`, {
            method: 'DELETE',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })

        getAllCours(1)
    }

    return {
        getAllCours,
        getCour,
        updateCour,
        createCour,
        deleteCour,
        getAllCoursArchived
    }
}