import{aW as p,T as _,o as i,f as m,b as r,a as e,u as a,w as f,y as v,e as g,d as y,g as V}from"./app-CDtrG3PD.js";import{a as l,b as n,_ as u}from"./TextInput-BKVN-nzu.js";import{P as x}from"./PrimaryButton-gY6E0QCU.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const b=r("header",null,[r("h2",{class:"text-lg font-medium text-gray-900"},"Changer votre mot de passe"),r("p",{class:"mt-1 text-sm text-gray-600"}," Utilisez au moins huit caractères, une majuscule, un caractère spécial et un chiffre. ")],-1),k={class:"flex items-center gap-4"},P={key:0,class:"text-sm text-gray-600"},I={__name:"UpdatePasswordForm",setup(S){const d=p(null),c=p(null),s=_({current_password:"",password:"",password_confirmation:""}),w=()=>{s.put(route("password.update"),{preserveScroll:!0,onSuccess:()=>s.reset(),onError:()=>{s.errors.password&&(s.reset("password","password_confirmation"),d.value.focus()),s.errors.current_password&&(s.reset("current_password"),c.value.focus())}})};return(h,o)=>(i(),m("section",null,[b,r("form",{onSubmit:g(w,["prevent"]),class:"mt-6 space-y-6"},[r("div",null,[e(u,{for:"current_password",value:"Mot de passe actuel"}),e(l,{id:"current_password",ref_key:"currentPasswordInput",ref:c,modelValue:a(s).current_password,"onUpdate:modelValue":o[0]||(o[0]=t=>a(s).current_password=t),type:"password",class:"mt-1 block w-full",autocomplete:"current-password"},null,8,["modelValue"]),e(n,{message:a(s).errors.current_password,class:"mt-2"},null,8,["message"])]),r("div",null,[e(u,{for:"password",value:"Nouveau mot de passe"}),e(l,{id:"password",ref_key:"passwordInput",ref:d,modelValue:a(s).password,"onUpdate:modelValue":o[1]||(o[1]=t=>a(s).password=t),type:"password",class:"mt-1 block w-full",autocomplete:"new-password"},null,8,["modelValue"]),e(n,{message:a(s).errors.password,class:"mt-2"},null,8,["message"])]),r("div",null,[e(u,{for:"password_confirmation",value:"Confirmez votre mot de passe"}),e(l,{id:"password_confirmation",modelValue:a(s).password_confirmation,"onUpdate:modelValue":o[2]||(o[2]=t=>a(s).password_confirmation=t),type:"password",class:"mt-1 block w-full",autocomplete:"new-password"},null,8,["modelValue"]),e(n,{message:a(s).errors.password_confirmation,class:"mt-2"},null,8,["message"])]),r("div",k,[e(x,{disabled:a(s).processing},{default:f(()=>[y("Sauvegarder")]),_:1},8,["disabled"]),e(v,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:f(()=>[a(s).recentlySuccessful?(i(),m("p",P,"Sauvegarder.")):V("",!0)]),_:1})])],32)]))}};export{I as default};
