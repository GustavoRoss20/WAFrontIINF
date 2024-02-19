using Microsoft.AspNetCore.Mvc.Rendering;

namespace WAFrontIINF.Utilities
{
    public static class NavigationHelpers
    {
        public static bool IsActive(ViewContext viewContext, string controller)
        {
            return viewContext.RouteData.Values["controller"]?.ToString() == controller;
        }

        public enum Controllers
        {
            Home,
            Egresados,
            Docentes,
            Contactanos,
            FabricaSoftware,
            NodoSireTec,
            Reticula,
            Convenios,
            Noticias,
            Transformacion,
        };

        public const string homeController = nameof(Controllers.Home);
        public const string egresadosController = nameof(Controllers.Egresados);
        public const string docentesController = nameof(Controllers.Docentes);
        public const string contactanosController = nameof(Controllers.Contactanos);
        public const string fabricaController = nameof(Controllers.FabricaSoftware);
        public const string NodoController = nameof(Controllers.NodoSireTec);
        public const string reticulaController = nameof(Controllers.Reticula);
        public const string conveniosController = nameof(Controllers.Convenios);
        public const string noticiasController = nameof(Controllers.Noticias);
        public const string transformacionController = nameof(Controllers.Transformacion);
    }
}
