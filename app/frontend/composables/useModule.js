import dayjs from 'dayjs';

export function useModule () {
    const cookie = useCookie("auth")
    const data = useState("modulesData", () => [])
    const dataArchived = useState("modulesDataArchive", () => [])
    const linksArchived = useState("moduleLinksArchive", () => [])
    const links = useState("moduleLinks", () => [])
    const oneModule = useState("moduleData", () => [])
    const moduleEnum = "module"


    async function getAllModules (page) {
        data.value = []

        const response = await $fetch(`http://localhost:8000/api/v1/modules?page=${page}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`
            }
        })

        console.log(response);
        response.data.forEach(element => {
            const module = {
                module_id: "",
                module_name: "",
                module_code: "",
                createdAt: "",
                deletedAt: ""
            }
            module.module_id = element.module_id
            module.module_name = element.module_name
            module.module_code = element.module_code
            module.hoursAssigned = element.module_id
            module.deletedAt = element.deleted_at
            module.createdAt = dayjs(element.created_at).format("ddd, MMM D YYYY")

            if (data.value.length < 10 && module.deletedAt === null) {
                data.value.push(module)
            }
        });

        links.value = []
        if (links.value.length === 0) {
            links.value.push(response.total)
            links.value.push(response.per_page)
        }

    }

    async function getAllModulesArchived (page) {
        dataArchived.value = []

        const response = await $fetch(`http://localhost:8000/api/v1/modules?page=${page}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`
            }
        })

        console.log(response);
        response.data.forEach(element => {
            const module = {
                module_id: "",
                module_name: "",
                module_code: "",
                createdAt: "",
                deletedAt: ""
            }
            module.module_id = element.module_id
            module.module_name = element.module_name
            module.module_code = element.module_code
            module.hoursAssigned = element.module_id
            module.deletedAt = element.deleted_at
            module.createdAt = dayjs(element.created_at).format("ddd, MMM D YYYY")

            if (dataArchived.value.length < 10 && module.deletedAt !== null) {
                dataArchived.value.push(module)
            }
        });

        linksArchived.value = []
        if (linksArchived.value.length === 0) {
            linksArchived.value.push(response.total)
            linksArchived.value.push(response.per_page)
        }

    }

    async function getModule (moduleId) {
        const module = {
            module_id: "",
            module_name: "",
            module_code: "",
            module_hours: "",
            description: "",
            createdAt: "",
            filiere: {
                filiere_id: "",
                filiere_name: "",
                filiere_level: "",
            },
            cours: []
        }

        const response = await $fetch(`http://localhost:8000/api/v1/modules/${moduleId}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })

        module.module_id = response.module_id
        module.module_name = response.module_name
        module.module_code = response.module_code
        module.description = response.description
        module.module_hours = response.module_hours
        module.createdAt = dayjs(response.createdAt).format("ddd, MMM D YYYY")
        module.filiere.filiere_id = response.filiere.filiere_id,
        module.filiere.filiere_name = response.filiere.filiere_name,
        module.filiere.filiere_level = response.filiere.filiere_level,

        // module.cours = []
        response.cours.forEach(cour => {
            module.cours.push(cour)
        })

        oneModule.value = []
        oneModule.value.push(module)
    }

    async function updateModule (moduleData, moduleId) {

        getModule(moduleId);

        console.log(moduleData.module_name);

        const responseA = await $fetch(`http://localhost:8000/api/v1/modules/${parseInt(moduleId)}`, {
            method: 'PUT',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            },
            body: {
                module_name: moduleData.module_name,
                module_code: moduleData.module_code,
                module_hours: moduleData.module_hours,
                description: moduleData.description,
                filiere_id: moduleData.filiere.code
            }
        })

        getAllModules(1)
        return navigateTo('/admin/modules-filieres/modules')
    }

    async function createModule (moduleData) {

        const responseA = await $fetch(`http://localhost:8000/api/v1/modules`, {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            },
            body: {
                module_name: moduleData.module_name,
                module_code: moduleData.module_code,
                module_hours: moduleData.module_hours,
                description: moduleData.description,
                filiere_id: moduleData.filiere_id.code
            }
        })

        getAllModules(1)
        return navigateTo('/admin/modules-filieres/modules')
    }

    async function deleteModule (moduleId) {

        const responseA = await $fetch(`http://localhost:8000/api/v1/modules/${moduleId}`, {
            method: 'DELETE',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })

        getAllModules(1)
    }

    return {
        getAllModules,
        getModule,
        updateModule,
        createModule,
        deleteModule,
        getAllModulesArchived
    }
}