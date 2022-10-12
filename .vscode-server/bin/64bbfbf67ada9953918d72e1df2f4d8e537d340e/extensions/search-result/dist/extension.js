(()=>{"use strict";var e={622:e=>{e.exports=require("path")},549:e=>{e.exports=require("vscode")}},t={};function n(i){var r=t[i];if(void 0!==r)return r.exports;var o=t[i]={exports:{}};return e[i](o,o.exports,n),o.exports}var i={};(()=>{var e=i;Object.defineProperty(e,"__esModule",{value:!0}),e.activate=void 0;const t=n(549),r=n(622),o=/^(\S.*):$/,a=/^(\s+)(\d+)(: |  )(\s*)(.*)$/,s=/⟪ ([0-9]+) characters skipped ⟫/g,c={language:"search-result",exclusive:!0},l=["# Query:","# Flags:","# Including:","# Excluding:","# ContextLines:"],g=["RegExp","CaseSensitive","IgnoreExcludeSettings","WordMatch"];let u,d;function p(e,n){const i="(Settings) ";if(e.startsWith(i))return t.Uri.file(e.slice(i.length)).with({scheme:"vscode-userdata"});if(r.isAbsolute(e))return/^[\\\/]Untitled-\d*$/.test(e)?t.Uri.file(e.slice(1)).with({scheme:"untitled",path:e.slice(1)}):t.Uri.file(e);if(0===e.indexOf("~/")){const n=process.env.HOME||process.env.HOMEPATH||"";return t.Uri.file(r.join(n,e.slice(2)))}const o=(e,n)=>t.Uri.joinPath(e.uri,n);if(t.workspace.workspaceFolders){const i=/^(.*) • (.*)$/.exec(e);if(i){const[,e,n]=i,r=t.workspace.workspaceFolders.filter((t=>t.name===e))[0];if(r)return o(r,n)}else{if(1===t.workspace.workspaceFolders.length)return o(t.workspace.workspaceFolders[0],e);if("untitled"!==n.scheme){const i=t.workspace.workspaceFolders.filter((e=>n.toString().startsWith(e.uri.toString())))[0];if(i)return o(i,e)}}}console.error(`Unable to resolve path ${e}`)}e.activate=function(e){const n=t.window.createTextEditorDecorationType({opacity:"0.7"}),i=t.window.createTextEditorDecorationType({fontWeight:"bold"}),r=e=>{const t=x(e.document).filter(h),r=t.filter((e=>e.isContext)).map((e=>e.prefixRange)),o=t.filter((e=>!e.isContext)).map((e=>e.prefixRange));e.setDecorations(n,r),e.setDecorations(i,o)};t.window.activeTextEditor&&"search-result"===t.window.activeTextEditor.document.languageId&&r(t.window.activeTextEditor),e.subscriptions.push(t.languages.registerDocumentSymbolProvider(c,{provideDocumentSymbols:(e,n)=>x(e,n).filter(f).map((e=>new t.DocumentSymbol(e.path,"",t.SymbolKind.File,e.allLocations.map((({originSelectionRange:e})=>e)).reduce(((e,t)=>e.union(t)),e.location.originSelectionRange),e.location.originSelectionRange)))}),t.languages.registerCompletionItemProvider(c,{provideCompletionItems(e,t){const n=e.lineAt(t.line);if(t.line>3)return[];if(0===t.character||1===t.character&&"#"===n.text){const n=Array.from({length:l.length}).map(((t,n)=>e.lineAt(n).text));return l.filter((e=>n.every((t=>-1===t.indexOf(e))))).map((e=>({label:e,insertText:e.slice(t.character)+" "})))}return-1===n.text.indexOf("# Flags:")?[]:g.filter((e=>-1===n.text.indexOf(e))).map((e=>({label:e,insertText:e+" "})))}},"#"),t.languages.registerDefinitionProvider(c,{provideDefinition(e,n,i){const r=x(e,i)[n.line];if(!r)return[];if("file"===r.type)return r.allLocations;const o=r.locations.find((e=>e.originSelectionRange.contains(n)));if(!o)return[];const a=new t.Position(o.targetSelectionRange.start.line,o.targetSelectionRange.start.character+(n.character-o.originSelectionRange.start.character));return[{...o,targetSelectionRange:new t.Range(a,a)}]}}),t.languages.registerDocumentLinkProvider(c,{provideDocumentLinks:async(e,t)=>x(e,t).filter(f).map((({location:e})=>({range:e.originSelectionRange,target:e.targetUri})))}),t.window.onDidChangeActiveTextEditor((e=>{"search-result"===e?.document.languageId&&(u=void 0,d?.dispose(),d=t.workspace.onDidChangeTextDocument((t=>{t.document.uri===e.document.uri&&r(e)})),r(e))})),{dispose(){u=void 0,d?.dispose()}})};const f=e=>"file"===e.type,h=e=>"result"===e.type;function x(e,n){if(u&&u.uri===e.uri&&u.version===e.version)return u.parse;const i=e.getText().split(/\r?\n/),r=[];let c,l;for(let g=0;g<i.length;g++){if(n?.isCancellationRequested)return[];const u=i[g],d=o.exec(u);if(d){const[,n]=d;if(c=p(n,e.uri),!c)continue;l=[];const i={targetRange:new t.Range(0,0,0,1),targetUri:c,originSelectionRange:new t.Range(g,0,g,u.length)};r[g]={type:"file",location:i,allLocations:l,path:n}}if(!c)continue;const f=a.exec(u);if(f){const[,e,n,i]=f,o=+n-1,a=(e+n+i).length,d=new t.Range(Math.max(o-3,0),0,o+3,u.length),p=[];let h,x=a,v=0;for(s.lastIndex=a;h=s.exec(u);)p.push({targetRange:d,targetSelectionRange:new t.Range(o,v,o,v),targetUri:c,originSelectionRange:new t.Range(g,x,g,s.lastIndex-h[0].length)}),v+=s.lastIndex-x-h[0].length+Number(h[1]),x=s.lastIndex;x<u.length&&p.push({targetRange:d,targetSelectionRange:new t.Range(o,v,o,v),targetUri:c,originSelectionRange:new t.Range(g,x,g,u.length)}),i.includes(":")&&l?.push(...p);const w={targetRange:d,targetSelectionRange:new t.Range(o,0,o,1),targetUri:c,originSelectionRange:new t.Range(g,0,g,a-1)};p.push(w),r[g]={type:"result",locations:p,isContext:" "===i,prefixRange:new t.Range(g,0,g,a)}}}return u={version:e.version,parse:r,uri:e.uri},r}})();var r=exports;for(var o in i)r[o]=i[o];i.__esModule&&Object.defineProperty(r,"__esModule",{value:!0})})();
//# sourceMappingURL=https://ticino.blob.core.windows.net/sourcemaps/64bbfbf67ada9953918d72e1df2f4d8e537d340e/extensions/search-result/dist/extension.js.map