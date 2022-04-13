const SELECTOR = 
{
  HTML: document.documentElement,
  TRIGGER: document.querySelector(`.menuButtonTrigger`)
};

const MenuClass = 
{
  OPENED: `openMenu`
};

SELECTOR.TRIGGER.addEventListener("click", () => 
{
	SELECTOR.HTML.classList.toggle(MenuClass.OPENED);
});