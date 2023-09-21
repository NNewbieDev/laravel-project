import React, { useEffect, useState } from "react";
import {
  Navbar,
  Collapse,
  Typography,
  Button,
  IconButton,
  List,
  ListItem,
  Menu,
  MenuHandler,
  MenuList,
  MenuItem,
  Chip,
} from "@material-tailwind/react";
import {
  ChevronDownIcon,
  UserCircleIcon,
  CubeTransparentIcon,
  Bars3Icon,
  XMarkIcon,
  FlagIcon,
  ChatBubbleOvalLeftIcon,
  UsersIcon,
  FolderIcon,
  Square3Stack3DIcon,
  RocketLaunchIcon,
  FaceSmileIcon,
  PuzzlePieceIcon,
  GiftIcon,
} from "@heroicons/react/24/outline";
import { useStateContext } from "../../context/ContextProvider";
import { Link } from "react-router-dom";
const colors = {
  blue: "bg-blue-50 text-blue-500",
  orange: "bg-orange-50 text-orange-500",
  green: "bg-green-50 text-green-500",
  "blue-gray": "bg-blue-gray-50 text-blue-gray-500",
  purple: "bg-purple-50 text-purple-500",
  teal: "bg-teal-50 text-teal-500",
  cyan: "bg-cyan-50 text-cyan-500",
  pink: "bg-pink-50 text-pink-500",
};

const navListMenuItems = [
  {
    color: "blue",
    icon: FlagIcon,
    title: "About us",
    description: "Learn about our story and our mission statement.",
  },
  {
    color: "orange",
    icon: ChatBubbleOvalLeftIcon,
    title: "Press",
    description: "News and writings, press releases, and resources",
  },
  {
    color: "green",
    icon: UsersIcon,
    title: (
      <div className="flex items-center gap-1">
        Careers{" "}
        <Chip
          size="sm"
          color="green"
          variant="ghost"
          value="We're hiring!"
          className="capitalize"
        />
      </div>
    ),
    description: "We are always looking for talented people. Join us!",
  },
  {
    color: "blue-gray",
    icon: FolderIcon,
    title: "Legal",
    description: "All the stuff that we dan from legal made us add.",
  },
  {
    color: "purple",
    icon: RocketLaunchIcon,
    title: "Products",
    description: "Checkout our products that helps a startup running.",
  },
  {
    color: "teal",
    icon: FaceSmileIcon,
    title: "Icons",
    description: "Set of beautiful icons that you can use in your project.",
  },
  {
    color: "cyan",
    icon: PuzzlePieceIcon,
    title: "UI Kits",
    description: "High quality UI Kits helps you to 2x faster.",
  },
  {
    color: "pink",
    icon: GiftIcon,
    title: "Open Source",
    description: "List of all our open-source projects, it's all free.",
  },
];

function NavListMenu() {
  const [isMenuOpen, setIsMenuOpen] = React.useState(false);
  const [isMobileMenuOpen, setIsMobileMenuOpen] = React.useState(false);
  


  const renderItems = navListMenuItems.map(
    ({ icon, title, description, color }, key) => (
      <Link to={"#"} key={key}>
        <MenuItem
          className={`${isMobileMenuOpen ? "flex" : "hidden"
            } text-black my-3 bg-white items-center gap-3 rounded-lg p-3 hover:bg-slate-200 `}
        >
          <div className={`rounded-lg p-5 ${colors[color]}`}>
            {React.createElement(icon, {
              strokeWidth: 2,
              className: "h-6 w-6",
            })}
          </div>
          <div>
            <Typography
              variant="h6"
              color="blue-gray"
              className="flex items-center text-sm"
            >
              {title}
            </Typography>
            <Typography variant="small" color="gray" className="font-normal">
              {description}
            </Typography>
          </div>
        </MenuItem>
      </Link>
    )
  );

  return (
    <React.Fragment>
      <Menu
        open={isMenuOpen}
        handler={setIsMenuOpen}
        offset={{ mainAxis: 20 }}
        placement="bottom"
      //         allowHover={false}
      >
        <MenuHandler>
          <Typography as="div" variant="small" className="font-normal">
            <ListItem
              className="flex items-center gap-2"
              selected={isMenuOpen || isMobileMenuOpen}
              onClick={() => setIsMobileMenuOpen((cur) => !cur)}
            >
              <Square3Stack3DIcon className="h-[18px] w-[18px]" />
              Resources
              <ChevronDownIcon
                strokeWidth={2.5}
                className={`hidden h-3 w-3 transition-transform lg:block ${isMenuOpen ? "rotate-180" : ""
                  }`}
              />
              <ChevronDownIcon
                strokeWidth={2.5}
                className={`block h-3 w-3 transition-transform lg:hidden ${isMobileMenuOpen ? "rotate-180" : ""
                  }`}
              />
            </ListItem>
          </Typography>
        </MenuHandler>
        <MenuList className="hidden max-w-screen-xl max-h-72 rounded-xl lg:block">
          {renderItems}
        </MenuList>
      </Menu>
      <div className="block lg:hidden">
        <Collapse open={isMobileMenuOpen}>{renderItems}</Collapse>
      </div>
    </React.Fragment>
  );
}

function NavList() {
  const { user, dispatch } = useStateContext();

  const login = (evt) => {
    evt.preventDefault();

    const process = async () => {
      try {
        dispatch({
          type: "logout",
        });
      } catch (err) {
        console.error(err);
      }
    };
    process();
  };
  
  return (
    <List className=" mt-4 mb-6 p-0 lg:mt-0 lg:mb-0 lg:flex-row lg:p-1 items-center">
      <Typography
        as="a"
        href="#"
        variant="small"
        color="blue-gray"
        className="font-normal"
      >
        <ListItem className="flex items-center gap-2 ">
          <CubeTransparentIcon className="h-[18px] w-[18px]" />
          Blocks
        </ListItem>
      </Typography>
      <NavListMenu />
      <Typography
        as="a"
        href="#"
        variant="small"
        color="blue-gray"
        className="font-normal"
      >
        <ListItem className="flex items-center gap-2 ">
          <UserCircleIcon className="h-[18px] w-[18px]" />
          {user === null ? "Account" 
          :<> <div>{user.username}</div>
              <Button onClick={(e) => login(e)} className="py-1 px-3" style={{backgroundColor: "black"}}>
                Đăng xuất
              </Button>
          </> }
        </ListItem>
      </Typography>
    </List>
  );
}

export default function Header() {
  const [openNav, setOpenNav] = useState(false);
  const { user, dispatch } = useStateContext();
  useEffect(() => {
    window.addEventListener(
      "resize",
      () => window.innerWidth >= 960 && setOpenNav(false)
    );
  }, []);

  return (
    <Navbar className=" text-black rounded-none rounded-bl-2xl rounded-br-2xl z-10 px-8 py-3  drop-shadow-md">
      <div className="flex items-center justify-between text-blue-gray-900">
        <Link
          to={"/"}
          className="w-10 md:w-16 flex items-center justify-center"
        >
          <img src="/logo.png" alt="News" />
        </Link>
        <div className="hidden lg:block">
          <NavList />
        </div>
        <div className="hidden gap-2 lg:flex">
          {user === null ? (
            <>
              <Button variant="text" size="sm" color="blue-gray">
                <Link to={"/login"}>Đăng nhập</Link>
              </Button>
              <Button variant="text" size="sm">
                <Link to={"/register"}>Đăng ký</Link>
              </Button>
            </>
          ) : (
            <>
              <Button variant="text" size="sm" color="blue-gray">
                {/* Đăng nhập */}
              </Button>
              <Button
                onClick={() => dispatch({ type: "logout" })}
                variant="gradient"
                size="sm"
              >
                Đăng xuất
              </Button>
            </>
          )}
        </div>
        <IconButton
          variant="text"
          color="blue-gray"
          className="lg:hidden flex justify-center items-center"
          onClick={() => setOpenNav(!openNav)}
        >
          {openNav ? (
            <XMarkIcon className="h-6 w-6" strokeWidth={2} />
          ) : (
            <Bars3Icon className="h-6 w-6" strokeWidth={2} />
          )}
        </IconButton>
      </div>
      {openNav && (
        <>
          {" "}
          <NavList />
          <div className="flex w-full flex-nowrap items-center gap-2 lg:hidden">
            <Button variant="outlined" size="sm" color="blue-gray" fullWidth>
              <Link to={"/login"}>Đăng nhập</Link>
            </Button>
            <Button variant="text" size="sm" fullWidth>
              <Link to={"/register"}>Đăng ký</Link>
            </Button>
          </div>
        </>
      )}
      {/* <Collapse open={openNav}>
       
      </Collapse> */}
    </Navbar>
  );
}
