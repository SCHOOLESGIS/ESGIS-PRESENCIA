import dayjs from 'dayjs';

export function useRapport () {
    const cookie = useCookie("auth")
    const data = useState("rapportsData", () => [])
    const dataArchived = useState("rapportsDataArchive", () => [])
    const links = useState("rapportLinks", () => [])
    const linksArchived = useState("rapportLinksArchive", () => [])
    const rapport = useState("rapportData", () => [])
    const rapportEnum = "rapport"


    async function getAllRapports (page) {
        data.value = []

        const response = await $fetch(`http://localhost:8000/api/v1/rapports?page=${page}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`
            }
        })

        console.log(response);
        response.data.forEach(element => {
            const rapport = {
                rapport_id: "",
                enseignant: "",
                hour_number: "",
                absence_number: "",
                justification_number: "",
                createdAt: "",
                deletedAt: ""
            }
            rapport.rapport_id = element.rapport_id
            rapport.enseignant = element.enseignant?.user?.name + ' ' + element.enseignant?.user?.surname
            rapport.hour_number = element.hour_number
            rapport.absence_number = element.absence_number
            rapport.justification_number = element.justification_number
            rapport.deletedAt = element.deleted_at
            rapport.createdAt = dayjs(element.created_at).format("ddd, MMM D YYYY")

            if (data.value.length < 10 && rapport.deletedAt === null) {
                data.value.push(rapport)
            }
        });

        links.value = []
        if (links.value.length === 0) {
            links.value.push(response.total)
            links.value.push(response.per_page)
        }

    }

    async function getAllRapportsArchived (page) {
        dataArchived.value = []

        const response = await $fetch(`http://localhost:8000/api/v1/rapports?page=${page}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`
            }
        })

        console.log(response);
        response.data.forEach(element => {
            const rapport = {
                rapport_id: "",
                enseignant: "",
                hour_number: "",
                absence_number: "",
                justification_number: "",
                createdAt: "",
                deletedAt: ""
            }
            rapport.rapport_id = element.rapport_id
            rapport.enseignant = element.enseignant?.user?.name + ' ' + element.enseignant?.user?.surname
            rapport.hour_number = element.hour_number
            rapport.absence_number = element.absence_number
            rapport.justification_number = element.justification_number
            rapport.deletedAt = element.deleted_at
            rapport.createdAt = dayjs(element.created_at).format("ddd, MMM D YYYY")

            if (dataArchived.value.length < 10 && rapport.deletedAt !== null) {
                dataArchived.value.push(rapport)
            }
        });

        linksArchived.value = []
        if (linksArchived.value.length === 0) {
            linksArchived.value.push(response.total)
            linksArchived.value.push(response.per_page)
        }

    }

    async function getRapport (rapportId) {
        const rapport = {
            user_id: "",
            rapport_id: "",
            name: "",
            surname: "",
            email: "",
            createdAt: "",
            modules: []
        }

        const response = await $fetch(`http://localhost:8000/api/v1/rapports/${rapportId}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })

        rapport.user_id = response.user_id
        rapport.rapport_id = response.rapport_id
        rapport.name = response.user.name
        rapport.surname = response.user.surname
        rapport.email = response.user.email
        rapport.createdAt = response.createdAt
        // console.log(response.cours[0]);
        response.cours.forEach(cour => {
            const module = {
                module_id: "",
                module_name: "",
                module_code: "",
                created_at: "",
            }

            module.module_id = cour.module.module_id
            module.module_name = cour.module.module_name
            module.module_code = cour.module.module_code
            module.created_at = cour.module.created_at

            rapport.modules.push(module)
        })
        rapport.value = []
        rapport.value.push(rapport);
    }

    async function updateRapport (rapportData, rapportId) {

        await getRapport(rapportId);

        const rapportFound = rapport.value[0];
        console.log("rapport ", rapportFound)
        if (!rapportFound) {
            console.error("rapport non trouvé");
            return;
        }

        const responseA = await $fetch(`http://localhost:8000/api/v1/rapports/${rapportFound.user_id}`, {
            method: 'PUT',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            },
            body: {
                cour_id: rapportData.cour_id,
                rapport_date: rapportData.rapport_date,
                status: rapportData.status,
            }
        })

        getAllRapports(1)
        return navigateTo('/admin/rapports/rapports-liste')
    }

    async function createRapport (rapportData) {

        const responseA = await $fetch(`http://localhost:8000/api/v1/rapports`, {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            },
            body: {
                cour_id: rapportData.cour_id,
                rapport_date: rapportData.rapport_date,
                status: rapportData.status,
            }
        })

        getAllRapports(1)
        return navigateTo('/admin/rapports/rapports-liste')
    }

    async function deleteRapport (rapportId) {

        const responseA = await $fetch(`http://localhost:8000/api/v1/rapports/${rapportId}`, {
            method: 'DELETE',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })

        getAllRapports(1)
    }

    return {
        getAllRapports,
        getRapport,
        updateRapport,
        createRapport,
        deleteRapport,
        getAllRapportsArchived
    }
}