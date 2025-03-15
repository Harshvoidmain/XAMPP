import { Atom, Calendar, Users, FileText, BookOpen, Archive, Download, Mail, User } from 'lucide-react';
import React from 'react';

function App() {
  return (
    <div className="min-h-screen bg-white">
      {/* Header */}
      <header className="bg-slate-50 border-b border-slate-200">
        <div className="container mx-auto px-4 py-4 flex justify-between items-center">
          <div className="flex items-center space-x-4">
            <div className="flex items-center">
              <Atom className="w-12 h-12 text-indigo-700" />
              <span className="ml-2 text-sm text-slate-600">ICNTE</span>
            </div>
            <div className="max-w-2xl">
              <h1 className="text-sm font-semibold text-indigo-700">IEEE & IAS Technically Co-Sponsored</h1>
              <h2 className="text-lg font-bold text-slate-900">6th Biennial International Conference on Nascent Technologies in Engineering</h2>
              <p className="text-sm text-slate-600">31st January-1st February 2025</p>
            </div>
          </div>
          <img 
            src="https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80"
            alt="College Logo"
            className="w-16 h-16 object-contain"
          />
        </div>
      </header>

      {/* Navigation */}
      <nav className="bg-indigo-700 text-white shadow-lg">
        <div className="container mx-auto px-4">
          <ul className="flex space-x-6 py-4">
            <li className="hover:text-indigo-200 transition-colors"><a href="#" className="flex items-center"><BookOpen className="w-4 h-4 mr-1" /> Home</a></li>
            <li className="hover:text-indigo-200 transition-colors"><a href="#" className="flex items-center"><FileText className="w-4 h-4 mr-1" /> Call for Papers</a></li>
            <li className="hover:text-indigo-200 transition-colors"><a href="#" className="flex items-center"><Calendar className="w-4 h-4 mr-1" /> Conference Details</a></li>
            <li className="hover:text-indigo-200 transition-colors"><a href="#" className="flex items-center"><Users className="w-4 h-4 mr-1" /> People</a></li>
            <li className="hover:text-indigo-200 transition-colors"><a href="#" className="flex items-center"><FileText className="w-4 h-4 mr-1" /> Submission</a></li>
            <li className="hover:text-indigo-200 transition-colors"><a href="#" className="flex items-center"><User className="w-4 h-4 mr-1" /> Registration</a></li>
            <li className="hover:text-indigo-200 transition-colors"><a href="#" className="flex items-center"><Archive className="w-4 h-4 mr-1" /> Archives</a></li>
            <li className="hover:text-indigo-200 transition-colors"><a href="#" className="flex items-center"><Download className="w-4 h-4 mr-1" /> Downloads</a></li>
            <li className="hover:text-indigo-200 transition-colors"><a href="#" className="flex items-center"><Mail className="w-4 h-4 mr-1" /> Contact us</a></li>
          </ul>
        </div>
      </nav>

      {/* Hero Section */}
      <section className="relative h-[600px]">
        <img 
          src="https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80"
          alt="College Campus"
          className="w-full h-full object-cover"
        />
        <div className="absolute inset-0 bg-gradient-to-r from-indigo-900/90 to-indigo-800/70">
          <div className="container mx-auto px-4 h-full flex flex-col justify-center">
            <h1 className="text-5xl font-bold text-white mb-4">
              Fr. Conceicao Rodrigues Institute of Technology
            </h1>
            <p className="text-2xl text-white/90">
              Sector 9A, Vashi, Navi Mumbai, Maharashtra 400703
            </p>
            <button className="mt-8 bg-white text-indigo-900 px-8 py-3 rounded-lg font-semibold hover:bg-indigo-50 transition-colors inline-flex items-center w-fit">
              <Mail className="w-5 h-5 mr-2" />
              Contact us
            </button>
          </div>
        </div>
      </section>

      {/* Updates Section */}
      <section className="py-16 bg-slate-50">
        <div className="container mx-auto px-4">
          <div className="grid grid-cols-2 gap-16">
            <div>
              <h2 className="text-3xl font-bold text-slate-900 mb-6">About the Institute</h2>
              <p className="text-slate-600 leading-relaxed">
                Agnel charities' Fr. C. Rodrigues Institute of Technology, Vashi, was established in 1994 in the heart of Navi Mumbai, Vashi, as a part of Agnel Technical Education Complex. The aim of the Institute is to provide quality technical education in addition to inculcating moral values in its students.
              </p>
            </div>
            <div>
              <h2 className="text-3xl font-bold text-slate-900 mb-6">About the Conference</h2>
              <p className="text-slate-600 leading-relaxed">
                It is proposed to organize the 6th IEEE & IAS Technically Co-Sponsored Biennial International Conference on Nascent Technologies in Engineering (ICNTE 2025) at Fr. C. Rodrigues Institute of Technology, Vashi, Navi Mumbai (INDIA). The previous conferences were technically co-sponsored by IEEE.
              </p>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
}

export default App;