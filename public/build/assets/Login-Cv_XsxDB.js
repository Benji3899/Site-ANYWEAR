import{h as w,i as k,v,o as i,f as x,T as y,c,w as n,a as t,u as s,Z as V,t as C,g as p,b as r,j as B,d as f,n as $,e as q}from"./app-CDtrG3PD.js";import{_ as M}from"./GuestLayout-DkkOZcin.js";import{_,a as g,b as h}from"./TextInput-BKVN-nzu.js";import{P as N}from"./PrimaryButton-gY6E0QCU.js";import{_ as P}from"./AuthenticatedLayout-DFPGf4IT.js";import{F as S}from"./Footer-D2A5V0Nq.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const U=["value"],F={__name:"Checkbox",props:{checked:{type:[Array,Boolean],required:!0},value:{default:null}},emits:["update:checked"],setup(l,{emit:e}){const m=e,d=l,o=w({get(){return d.checked},set(a){m("update:checked",a)}});return(a,u)=>k((i(),x("input",{type:"checkbox",value:l.value,"onUpdate:modelValue":u[0]||(u[0]=b=>o.value=b),class:"rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"},null,8,U)),[[v,o.value]])}},j=r("title",null,"Connexion",-1),D={key:0,class:"mb-4 font-medium text-sm text-green-600"},E={class:"mt-4"},R={class:"block mt-4"},T={class:"flex items-center"},z=r("span",{class:"ms-2 text-sm text-gray-600"},"Se souvenir de moi",-1),A={class:"flex items-center justify-end mt-4"},O={__name:"Login",props:{canResetPassword:{type:Boolean},status:{type:String}},setup(l){const e=y({email:"",password:"",remember:!1}),m=()=>{e.post(route("login"),{onFinish:()=>e.reset("password")})};return(d,o)=>(i(),c(P,null,{default:n(()=>[t(M,{class:"my-16 mx-auto w-10/12"},{default:n(()=>[t(s(V),{title:"Inscription"},{default:n(()=>[j]),_:1}),l.status?(i(),x("div",D,C(l.status),1)):p("",!0),r("form",{class:"",onSubmit:q(m,["prevent"])},[r("div",null,[t(_,{for:"email",value:"Email"}),t(g,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:s(e).email,"onUpdate:modelValue":o[0]||(o[0]=a=>s(e).email=a),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),t(h,{class:"mt-2",message:s(e).errors.email},null,8,["message"])]),r("div",E,[t(_,{for:"password",value:"Mot de passe"}),t(g,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:s(e).password,"onUpdate:modelValue":o[1]||(o[1]=a=>s(e).password=a),required:"",autocomplete:"current-password"},null,8,["modelValue"]),t(h,{class:"mt-2",message:s(e).errors.password},null,8,["message"])]),r("div",R,[r("label",T,[t(F,{name:"remember",checked:s(e).remember,"onUpdate:checked":o[2]||(o[2]=a=>s(e).remember=a)},null,8,["checked"]),z])]),r("div",A,[l.canResetPassword?(i(),c(s(B),{key:0,href:d.route("password.request"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:n(()=>[f(" Mot de passe oublié ? ")]),_:1},8,["href"])):p("",!0),t(N,{class:$(["ms-4",{"opacity-25":s(e).processing}]),disabled:s(e).processing},{default:n(()=>[f(" Connexion ")]),_:1},8,["class","disabled"])])],32)]),_:1}),t(S)]),_:1}))}};export{O as default};
