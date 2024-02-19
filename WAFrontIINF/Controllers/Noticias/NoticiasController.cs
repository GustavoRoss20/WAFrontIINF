using Microsoft.AspNetCore.Mvc;

namespace WAFrontIINF.Controllers.Noticias
{
    public class NoticiasController : Controller
    {
        public IActionResult Index()
        {
            return View();
        }
    }
}
